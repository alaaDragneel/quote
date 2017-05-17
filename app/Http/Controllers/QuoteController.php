<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Author;

use App\authorLog;

use App\Quote;

use App\Events\QuoteCreated;

use Illuminate\Support\Facades\Event;

class QuoteController extends Controller
{
    public function getIndex($author = null)
    {
         if(!is_null($author)) {
              $quote_author = Author::where('name', $author)->first();
              if($quote_author) {
                   $quotes = $quote_author->quotes()->orderBy('created_at', 'DESC')->paginate(4);
              }
         }else {

              $quotes = Quote::orderBy('created_at', 'DESC')->paginate(4);
         }
         return view('index', compact('quotes'));
    }

    public function postQuote(Request $request)
    {
         $this->validate($request, [
              'author' => 'required|max:60|alpha',
              'quote' => 'required|max:500',
              'email' => 'email|required'
         ]);
         $authorText = trim(ucfirst($request->author));
         $authorEmail = trim(ucfirst($request->email));
         $quoteText = trim($request->quote);

         $author = Author::where('name', $authorText)->first();

         if(!$author) {
              $author = new Author();
              $author->name = $authorText;
              $author->email = $authorEmail;
              $author->save();
         }

         $quote = new Quote();
         $quote->quote = $quoteText;
         $author->quotes()->save($quote);

         Event::fire(new QuoteCreated($author));

         return redirect()->route('index')->with([
              'success' => 'Quote save!'
         ]);
    }

    public function getDelete($id)
    {
         $quote = Quote::find($id);
         $author_deleted = false;
         if(count($quote->author->quotes) === 1){
              $quote->author->delete();
              $author_deleted = true;
         }
         $quote->delete();

         $msg = $author_deleted ? 'Quote and author Deleted' : 'Quote deleted!';
         return redirect()->route('index')->with([
              'success' => $msg
         ]);
    }

    public function getMailCallBack($authorName)
    {
         $author_log = new authorLog();
         $author_log->author = $authorName;
         $author_log->save();

         return view('email.callBack', ['author' => $authorName]);
    }
}
