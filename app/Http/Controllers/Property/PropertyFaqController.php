<?php

namespace App\Http\Controllers\Property;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyFaqController extends Controller
{
    public function index(Request $request, $id)
    {
        $property = Property::findorfail($id);
        $faqs = $property->faqs()->get();
        return view('admin.property.faq.index', compact('faqs', 'property'));
    }

    public function frequentlyAskedQuestion(Request $request, $id)
    {
        $property = Property::findorfail($id);
        $data = $this->validate($request, $this->getRules());
        try {
            $property->faqs()->delete();
            foreach ($data['questions'] as $key => $item) {
                $property->faqs()->create([
                    'question' => $item,
                    'answer' => $data['answers'][$key]
                ]);
            }
            request()->session()->flash('success', 'FAQ updated successfully');
            return redirect()->back();
        } catch (\Throwable $th) {
            request()->session()->flash('error', $th->getMessage());
            return redirect()->back();
        }
    }

    private function getRules()
    {
        return [

            'questions' => ['required', 'array'],
            'questions.*' => ['string'],
            'answers' => ['required', 'array'],
            'answers.*' => ['string'],
        ];
    }
}
