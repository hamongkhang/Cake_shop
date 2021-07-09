<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmail;
class EmailController extends Controller
{
    public function sendEmail()
    {
       $message="khang"; 
       SendEmail::dispatch($message, "khang.ha22@student.passerellesnumeriques.org")->delay(now()->addMinute(1));
    }
}