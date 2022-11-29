<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TradelinkBookingResource;
use App\Models\Tradelink;
use App\Models\TradelinkBook;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class TradelinkBookingController extends Controller
{
    public function index()
    {
        $professionals = Tradelink::selectRaw('tradelinks.*,tradelink_books.created_at as date,tradelink_books.id as booking_id,tradelink_books.status')
            ->join('tradelink_books', 'tradelink_books.tradelink_id', 'tradelinks.id')
            ->where('tradelink_books.user_id', request()->user()->id)
            ->orderBy('tradelink_books.id', 'desc')
            ->paginate(10);
        return $this->returnResponse(TradelinkBookingResource::collection($professionals, $paginate = true));
    }

    public function store(Request $request)
    {
        try {
            Validator::make($request->all(), ['id' => ['required', 'exists:tradelinks,id']])->validate();
            $user  = User::find($request->user()->id);
            if ($user->book()->where([['tradelink_id', $request->id], ['status', 'pending']])->exists()) {
                throw  ValidationException::withMessages(['id' => 'pending work remaining. Either complete or cancel the existing work first']);
            }
            $user->booking()->attach($request->id);

            return $this->successResponse('booked', 'booked');
        } catch (ValidationException $th) {
            return $this->validationError($th);
        } catch (\Exception $th) {
            return $this->errorResponse($th->getMessage());
        }
    }

    public function toggleStatus(Request $request)
    {


        try {
            Validator::make($request->all(), [
                'status' => ['required', 'in:completed,cancelled,progress'],
                'booking_id' => ['required','exists:tradelink_books,id']
            ])->validate();

            $user  = User::find($request->user()->id);
            $booking =  $user->book()->where('id', $request->booking_id)->firstorfail();
            // <<--Checking if the status is processable or not [pending < progress < cancelled < completed]-->>
            if (TradelinkBook::LEVEL[$booking->status] >= TradelinkBook::LEVEL[$request->status]) {
                throw  ValidationException::withMessages(['status' => 'Illogical Chronlogical order of status, pending < progress < cancelled < completed']);
            }
            $booking->update([
                'status' => $request->status
            ]);
            return $this->successResponse('statusChanged', 'statusChanged');
        } catch (ModelNotFoundException $th) {
            return $this->errorResponse($th->getMessage());
        } catch (ValidationException $th) {
            return $this->validationError($th);
        } catch (\Exception $th) {
            return $this->errorResponse($th->getMessage());
        }
    }
}
