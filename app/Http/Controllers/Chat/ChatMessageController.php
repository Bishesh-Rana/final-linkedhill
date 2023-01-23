<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Controller;
use App\Models\ChatCategory;
use App\Models\ChatMessage;
use App\Models\ConversationList;
use App\Models\Question;
use Illuminate\Http\Request;

class ChatMessageController extends Controller
{
    public function __construct(ConversationList $conversation, ChatMessage $message)
    {
        $this->conversation = $conversation;
        $this->message = $message;
    }

    public function getMessages(Request $request)
    {
        // dd( $request->conversation_id);
        $categories = ChatCategory::where('publish_status', '1')->get();
        if ($request->conversation_id) {
            $conversation_info = $this->conversation
                ->select('id', 'conversation_id')
                ->where('conversation_id', $request->conversation_id)
                ->first();
            if ($conversation_info) {
                $messages_list = $this->message
                    ->where('conversationId', $conversation_info->id)
                    ->with(['messageQuestion' => function ($qr) {
                        return $qr->select('*');
                    }])
                    ->orderBy('id', 'DESC')
                    ->paginate(500);

                if ($messages_list->currentpage() == 1) {

                    $items = array_reverse($messages_list->items());
                    //    $items = $items->items();

                } else {
                    $items = $messages_list->items();
                }
                // dd($items);
                foreach ($items as $message_data) {
                    $message_data->messaged_at = $message_data->created_at->diffForHumans();
                    $message_data->message = html_entity_decode($message_data->message);
                    // dd($message_data);
                }
                return response()->json([
                    'status' => true,
                    'status_code' => 200,
                    'message' => 'Message found',
                    "categories" => $categories,

                    'conversation_id' => $conversation_info->conversation_id,
                    'message_data' => [
                        'messages_list' => $items,
                        'current_page' => $messages_list->currentpage(),
                        'total' => $messages_list->total(),
                        'perPage' => $messages_list->perPage(),
                        'lastPage' => $messages_list->lastPage(),
                    ],
                    'success' => true,
                ], 200);
            } else {
                return response()->json([
                    'status' => true,
                    'status_code' => 404,
                    'message' => 'Conversation not found',
                    "categories" => $categories,
                    'conversation_id' => null,
                    'message_data' => [
                        'messages_list' => null,
                        'current_page' => null,
                        'total' => null,
                        'perPage' => null,
                        'lastPage' => null,
                    ],
                    'success' => false,
                ], 404);
            }
        }
    }

    public function StartConversation(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|email',
            'phone' => 'required|string|min:7|max:20',
            'name' => 'required|string|min:3|max:50',
            'message' => 'required|string|min:1|max:1000',
        ]);
        if ($validation->fails()) {
            // dd($validation->messages()->getMessages());
            $error_message_list = [];
            foreach ($validation->messages()->getMessages() as $key => $error_message) {
                $error_message_list[$key] = $error_message[0];
            }

            return response()->json([
                'status' => true,
                'status_code' => 204,
                'message' => $this->getToJson($error_message_list),
                'messages_list' => null,
                'conversation_id' => null,
                'success' => false,
            ], 204);
        }
        $conversation_id = strtolower(\Str::random(10));
        $data = [
            'email' => $request->email,
            'phone' => $request->phone,
            'fullname' => $request->name,
            'conversation_id' => $conversation_id,
        ];
        // dd($data);
        $conversation_info = $this->conversation->create($data);
        // dd($conversation_info);
        if ($conversation_info) {
            // $message = 'Welcome to our service, This automated reply, please wait for  a while.';
            // $message_data = [
            //     // 'email' => $request->email,
            //     "messageFrom" => "user",
            //     "message_by" => "user",
            //     // "message_by" => "user",
            //     'message' => $request->message,
            //     'text' => $request->message,
            //     "sender_seen" => "seen",
            //     "receiver_seen" => "unseen",
            //     "receiver_action" => "0",
            //     "sender_action" => "0",
            //     "messageIn" => "en",
            //     "messageIn" => "en",
            //     'by_system' => 'no',
            //     'conversation_id' => $conversation_info->id,
            // ];
            // $this->message->create($message_data);
            // $message_data = [
            //     'email' => $request->email,
            //     'message' => $message,
            //     'text' => $message,
            //     'by_system' => 'yes',

            //     'conversation_id' => $conversation_info->id,
            // ];
            // $message_info = $this->message->create($message_data);
            // $admins = User::select('id', 'group')->where('group', 88888)->orWhere('group', 99999)->get();
            // event(new MessageFire($message_info, 'message', 'user', null));
            // foreach ($admins as $admin_data) {
            //     event(new MessageFire($message_info, $admin_data->id,   'message'));
            // }
            $message_info = $this->message
                ->where('conversationId', $conversation_info->id)
                ->get();
            $categories = ChatCategory::where('publish_status', '1')->get();
            return response()->json([
                'status' => true,
                'status_code' => 200,
                'message' => 'Conversation started successfully.',
                // 'messages_list' => $message_info,
                "categories" => $categories,
                'conversation_id' => $conversation_info->conversation_id,
                'success' => true,
            ], 200);
        } else {
            return response()->json([
                'status' => true,
                'status_code' => 500,
                'message' => 'Conversation could not be stabilished now , Please try again.',
                'messages_list' => null,
                'conversation_id' => null,
                'success' => false,
            ], 500);
        }
    }

    public function sendMessage(Request $request)
    {
        // dd($request->all());
        $validation = Validator::make($request->all(), [
            'message' => 'required|string|min:1|max:1000',
        ]);
        if ($validation->fails()) {
            // dd($validation->messages()->getMessages());
            $error_message_list = [];
            foreach ($validation->messages()->getMessages() as $key => $error_message) {
                $error_message_list[$key] = $error_message[0];
            }

            return response()->json([
                'status' => true,
                'status_code' => 204,
                'message' => $this->getToJson($error_message_list),
                'message_data' => null,
                'success' => false,
            ], 204);
        }
        // dd($request->all());
        $conversation_info = $this->conversation
            ->select('id', 'conversation_id')
            ->where('conversation_id', $request->conversation_id)
            ->first();
            $existing_anwser = null;
            if (!$request->categoryId && !$request->questionId) {
                $existing_anwser = Question::where('publish_status', '1')
                    ->where('search_key', 'like', "%$request->message%")
                    ->first();
            }
            // dd($existing_anwser);
            // dd($request->all());
        if ($conversation_info) {
            $message_data = [
                'conversationId' => $conversation_info->id,
                'message' => $request->message,
                'messageFrom' => 'user',
                "message_by" => "user",
                "categoryId" => @$request->categoryId,
                'text' => $request->message,
            ];
            $message_info = $this->message->create($message_data);
            // dd($message_info);
            if ($message_info) {
                $conversation_info->updated_at = date('Y-m-d H:i:s');
                $conversation_info->save();
                // $admins = User::select('id', 'group')->where('group', 88888)->orWhere('group', 99999)->get();

                $questions = null;
                if ($request->categoryId) {
                    // dd($request->categoryId);
                    $answers = ChatCategory::where('id', $request->categoryId)
                        ->where('publish_status', '1')
                        ->with(['chatAnswers' => function ($qr) {
                            return $qr->select('id', 'categoryId', 'references')
                                ->where('publish_status', '1')
                                ->orderBy('order', 'ASC');
                        },
                            'child_questions' => function ($qr) {
                                return $qr;
                            }])
                    // ->where('isParent', '1')
                        ->first();
                    $this->replyAsRefereneAnswer($answers, $conversation_info, @$request->lang);
                    // if($answers && $answers->chatAnswers){
                    //     // foreach($answers->chatAnswers as $answer){
                    //     //     // dd($answer);

                    //     // }

                    //     // dd($answers);
                    // }
                    // if($answers && $answers->child_questions && $answers->child_questions->count()){

                    // }
                }

                if ($request->questionId || $existing_anwser) {
                    $this->replyAutoMessage($request, $conversation_info, $existing_anwser, @$request->lang);
                }
                event(new MessageFire($message_info, 'message', 'user', null));
                return response()->json([
                    'status' => true,
                    'status_code' => 200,
                    'message' => "Message sent",
                    "questions" => $questions,
                    'message_data' => $message_info,
                    'success' => true,
                ], 200);
            } else {
                return response()->json([
                    'status' => true,
                    'status_code' => 204,
                    'message' => "Message could not be sent",
                    'message_data' => null,
                    'success' => true,
                ], 204);
            }
        }
    }
    protected function replyAsRefereneAnswer($answers, $conversation_info, $lang = 'np')
    {

        $message_data = [];
        // dd($answers);
        foreach ($answers->chatAnswers as $answer) {

            $msgItem = [
                'conversationId' => $conversation_info->id,
                'message' => $answer->references[$lang],
                'messageFrom' => 'admin',
                "message_by" => "bot",
                "sender_seen" => "seen",
                "receiver_seen" => "unseen",
                'text' => $answer->references[$lang],
                "created_at" => now(),

                // 'sender_id' => $request->user()->id
            ];
            $message_data[] = $msgItem;
            $item = $this->message->create($msgItem);
            if ($answers->chatAnswers->count() == 1 || $answers->chatAnswers->last() == $answer) {
                // dd($answers->chatAnswers->count());
                // $child_questions = [];

                $child_questions = [];
                foreach ($answers->child_questions as $child_question) {
                    $child_questions[] = [
                        'id' => $child_question->id,
                        "title" => $child_question->title,
                        "description" => $child_question->description,
                        "url" => $child_question->url,
                    ];
                }

                if ($answers && $answers->child_questions) {
                    $item->messageQuestion()->sync($answers->child_questions->pluck('id')->toArray());
                }
            }
        }
        // if($message_data){
        //     $this->message->insert($message_data);
        // }
        // dd($message_data);
        if ($conversation_info) {

            $conversation_id = $conversation_info->conversation_id;
            $conversation_info->updated_at = date('Y-m-d H:i:s');
            $conversation_info->save();
            $messeges = [];
            foreach ($message_data as $msg) {
                $messageDataItem = [
                    'message' => html_entity_decode($msg['message']),
                    'messaged_at' => $msg['created_at']->diffForHumans(),
                    'messageFrom' => 'admin',
                    "message_by" => "bot",
                    "sender_seen" => "seen",
                    "receiver_seen" => "unseen",
                ];
                if ((end($message_data) == $msg) || count($message_data) == 1) {
                    // dd(count($message_data));
                    $messageDataItem["message_question"] = @$child_questions;
                }
                $messeges[] = $messageDataItem;
                // $msg['message'] = html_entity_decode($msg['message']);
                // $msg['messaged_at'] = $msg['created_at']->diffForHumans(),
            }
            // dd($message_info->message);
            $replyData = [
                'message' => $messeges,
                // 'childQuestionList' => $child_questions,
            ];
            // dd($replyData);
            event(new MessageFire($replyData, 'message', 'admin', $conversation_id));
            return response()->json([
                'status' => true,
                'status_code' => 200,
                'message' => "Message sent",
                // 'message_data' => $message_info,
                'success' => true,
            ], 200);

        }
    }
    public function replyAutoMessage($request, $conversation_info, $existing_anwser = null , $lang = 'np')
    {

        $question = Question::find($request->questionId);
        if ($conversation_info) {
            if ($question || $existing_anwser) {
                if ($existing_anwser) {
                    $question = $existing_anwser;
                }
                $message_data = [
                    'conversationId' => $conversation_info->id,
                    'message' => $question->description[$lang],
                    'messageFrom' => 'admin',
                    "message_by" => "bot",
                    "sender_seen" => "seen",
                    "receiver_seen" => "unseen",
                    'text' => $question->description[$lang],
                    // 'sender_id' => $request->user()->id
                ];
                $message_info = $this->message->create($message_data);
                // dd($message_info);
                //9000000000001
                if ($message_info) {
                    $conversation_id = $conversation_info->conversation_id;
                    $conversation_info->updated_at = date('Y-m-d H:i:s');
                    $conversation_info->save();
                    $message_info->message = html_entity_decode($message_info->message);
                    // dd($message_info->message);
                    event(new MessageFire($message_info, 'message', 'admin', $conversation_id));
                    return response()->json([
                        'status' => true,
                        'status_code' => 200,
                        'message' => "Message sent",
                        'message_data' => $message_info,
                        'success' => true,
                    ], 200);
                } else {
                    return response()->json([
                        'status' => true,
                        'status_code' => 204,
                        'message' => "Message could not be sent",
                        'message_data' => null,
                        'success' => true,
                    ], 204);
                }

            }
        }
    }
    public function chatscript(Request $request){
        $startConversationUrls = [
            'message_url' => route('SendMessage'),
            'startConversation' => route('StartConversation'),
            'getMessages' => route('getMessages')
        ];
        return view('website.chat-script' ,compact('startConversationUrls'));
    }
}
