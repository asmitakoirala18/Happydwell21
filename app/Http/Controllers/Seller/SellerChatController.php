<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Models\Buyer;
use App\Models\ChatMessage;
use App\Models\SellerContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class SellerChatController extends Controller
{

    public function chatShow()
    {
        $email = Auth::guard('seller')->user()->email;

        $buyerData = SellerContact::where('seller_email', '=',
            $email)->get();


        $chatData = ChatMessage::all();
        $this->data('allConversation', $chatData);
        $this->data('buyerData', $buyerData);
        return view('seller.livechat', $this->data);
    }


    public function messageSend(Request $request)
    {

        $data['sender_username'] = Auth::guard('seller')->user()->username;
        $data['receiver_username'] = $request->receiver_username;

        $data['message'] = $request->message;
        $data['read'] = 0;
        if (ChatMessage::create($data)) {
            return Response::json(['success' => 'send'], 200);
        }


    }

    public function retrieveChatMessages(Request $request)
    {

        if ($request->isMethod('get')) {
            return false;
        }
        if ($request->isMethod('post')) {
            $username = Auth::guard('seller')->user()->username;
            $receiverUsername = $request->receiver_username;


            $allConversation = DB::table('chat_messages')
                ->where('sender_username', '=', $username)
                ->where('receiver_username', '=', $receiverUsername)
                ->orWhere('sender_username', '=', $receiverUsername)
                ->get();


            $output = '';

            foreach ($allConversation as $message) {
                if ($message->sender_username != $username) {
                    $output = "<div class='row message-body'>
                                    <div class='col-sm-12 message-main-receiver'>
                                        <div class='receiver'>
                                            <div class='message-text'>
                                                $message->message
                                            </div>
                                            <span class='message-time pull-right'>Sun</span>
                                        </div>
                                    </div>
                                </div>";

                } else {

                    $output = "<div class='row message-body'>
                                    <div class='col-sm-12 message-main-sender'>
                                        <div class='sender'>
                                            <div class='message-text'>
                                               $message->message
                                            </div>
                                            <span class='message-time pull-right'>
            SUN
                                    </span>
                                        </div>
                                    </div>
                                </div>";
                }


                echo $output;

            }

        }

    }


    public function fetchAllMessage(Request $request)
    {

        $receiverUsername = $request->receiver_username;
        $username = Auth::guard('seller')->user()->username;


        $allConversation = DB::table('chat_messages')
            ->where('receiver_username', '=', $receiverUsername)
            ->where('sender_username', '=', $username)
            ->orWhere('sender_username', '=', $receiverUsername)
            ->get();


        $output = '';

        foreach ($allConversation as $message) {
            if ($message->sender_username != $username) {
                $output = "<div class='row message-body'>
                                    <div class='col-sm-12 message-main-receiver'>
                                        <div class='receiver'>
                                            <div class='message-text'>
                                                $message->message
                                            </div>
                                            <span class='message-time pull-right'>Sun</span>
                                        </div>
                                    </div>
                                </div>";

            } else {

                $output = "<div class='row message-body'>
                                    <div class='col-sm-12 message-main-sender'>
                                        <div class='sender'>
                                            <div class='message-text'>
                                               $message->message
                                            </div>
                                            <span class='message-time pull-right'>
            SUN
                                    </span>
                                        </div>
                                    </div>
                                </div>";
            }


            echo $output;

        }


    }

}
