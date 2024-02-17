<?php

namespace App\Http\Controllers;

use App\Mail\AdminMail;
use App\Mail\ContactMail;
use App\Mail\SendAds;
use App\Mail\sendSelectedAds;
use App\Mail\SubscribeNotificationUser;
use App\Models\Admin;
use App\Models\Blog;
use App\Models\Broadcast;
use App\Models\Contact;
use App\Models\Feature;
use App\Models\Project;
use App\Models\Subscribe;
use App\Models\User;
use App\Models\UserInquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;



/**
 * Summary of AdminController
 */
class AdminController extends Controller
{

    public function upload(Request $request)
    {
        $admin = Admin::find('1');
        if (is_null($admin)) {
            $admin = new Admin;

            //    validating the information
            $request->validate(
                [
                    'logo' => 'required|image|max:8000',
                    'banner1' => 'required|image|max:8000',
                    'home_heading' => 'required',
                    'home_subheading' => 'required',
                ]
            );

            if (!is_null($admin)) {
                //insert data
                if ($request->hasFile("logo"))
                    $admin->logo = $request->file("logo")->store("img", "public");
                if ($request->hasFile("banner1"))
                    $admin->banner1 = $request->file("banner1")->store("img", "public");
                $admin->home_heading = $request['home_heading'];
                $admin->home_subheading = $request['home_subheading'];
                $admin->save();
                return redirect('/dashboard')->with(["success" => "Record inserted successfully!!"]);
            } else {
                return redirect('/dashboard');
            }
        } else {
            $request->validate(
                [
                    'logo' => 'required|image|max:8000',
                    'banner1' => 'required|image|max:8000',
                    'home_heading' => 'required',
                    'home_subheading' => 'required',
                ]
            );

            if (!is_null($admin)) {
                //insert data
                if ($request->hasFile("logo"))
                    $admin->logo = $request->file("logo")->store("img", "public");
                if ($request->hasFile("banner1"))
                    $admin->banner1 = $request->file("banner1")->store("img", "public");
                $admin->home_heading = $request['home_heading'];
                $admin->home_subheading = $request['home_subheading'];
                $admin->save();
                return redirect('/dashboard')->with(["success" => "Record inserted successfully!!"]);
            } else {
                return redirect('/dashboard');
            }
        }
    }

    //show data in main site
    public function show()
    {
        $admin = Admin::first();
        $feature = Feature::all();
        $blog = Blog::all();
        $project = Project::all();
        $contact = Contact::all();
        $data = compact('admin', 'feature', 'blog', 'project', 'contact');
        return view('site')->with($data);
    }

    public function uploadFeature(Request $request)
    {
        $feature = new Feature;
        if ($request->hasFile("feature_logo"))
            $feature->feature_logo = $request->file("feature_logo")->store("img", "public");
        $feature->feature_heading = $request['feature_heading'];
        $feature->feature_description = $request['feature_description'];
        $feature->save();
        return redirect('/dashboard')->with(["feature_success" => "Feature inserted successfully!!"]);
    }
    public function editFeatureData($feature_id)
    {
        $featureEdit = Feature::find($feature_id);
        if (is_null($featureEdit)) {
            return redirect('/dashboard');
        } else {

            $url = url('/admin/feature/update') . "/" . $feature_id;
            $data = compact('url', 'featureEdit');
            return view('feature')->with($data);
        }
    }

    public function updateFeature($feature_id, Request $request)
    {
        $feature = Feature::find($feature_id);
        if (!is_null($feature)) {
            if ($request->hasFile("feature_logo"))
                $feature->feature_logo = $request->file("feature_logo")->store("img", "public");
            $feature->feature_heading = $request['feature_heading'];
            $feature->feature_description = $request['feature_description'];
            $feature->save();
            return redirect('/dashboard')->with(["feature_success" => "Record updated successfully!!"]);
        } else {
            return redirect('/dashboard');
        }
    }
    public function deleteFeature($feature_id)
    {
        $feature = Feature::find($feature_id);
        if (!is_null($feature)) {
            $feature->delete();
        }
        return redirect('/dashboard');
    }

    //update blog
    public function uploadBlog(Request $request)
    {
        $blog = new Blog;
        if ($request->hasFile("blog_image"))
            $blog->blog_image = $request->file("blog_image")->store("img/news", "public");
        $blog->blog_author = $request['blog_author'];
        $blog->blog_date = $request['blog_date'];
        $blog->blog_heading = $request['blog_heading'];
        $blog->blog_description = $request['blog_description'];
        $blog->user_id = Auth::user()->id;
        $blog->save();
        return redirect('/dashboard')->with(["blog_success" => "Record inserted successfully!!"]);
    }

    // use to show details of blog in admin pnl also all data
    public function blogShow()
    {
        $url = url('/admin/blog');
        $admin = Admin::find('1');
        $feature = Feature::all();
        $blogs = Blog::orderBy('created_at','desc')->get();
        $myBlog=Auth::user()->blogs()->orderBy('created_at','desc')->get();
        $project = Project::find('1');
        $subscriber = Subscribe::all();
        $contact = Contact::find('1');
        $inquiry = UserInquiry::all();
        $broadcast = Broadcast::first();
        $users = User::all();

        $totalSubscriber = 0;
        foreach ($subscriber as $info) {
            $totalSubscriber++;
        }
        $totalBlog = 0;
        foreach ($blogs as $info) {
            $totalBlog++;
        }
        $totalMyBlog = 0;
        foreach (Auth::user()->blogs as $info) {
            $totalMyBlog++;
        }
        $totalInquiry = 0;
        foreach ($inquiry as $info) {
            $totalInquiry++;
        }
        $data2 = compact('admin', 'url', 'feature', 'blogs', 'project', 'inquiry', 'subscriber', 'contact', 'broadcast', 'users', 'totalSubscriber', 'totalBlog', 'totalMyBlog', 'totalInquiry','myBlog');
        return view('dashboard')->with($data2);
    }
    // show blog data in the form
    public function editBlogData($blog_id)
    {
        $blogEdit = Blog::find($blog_id);
        if (is_null($blogEdit)) {
            return redirect('/dashboard');
        } else {

            $url = url('/admin/blog/update') . "/" . $blog_id;
            $data = compact('url', 'blogEdit');
            return view('blog')->with($data);
        }
    }
    //update blog
    public function updateBlog($blog_id, Request $request)
    {
        $blog = Blog::find($blog_id);
        if (!is_null($blog)) {
            if ($request->hasFile("blog_image"))
                $blog->blog_image = $request->file("blog_image")->store("img/news", "public");
            $blog->blog_author = $request['blog_author'];
            $blog->blog_date = $request['blog_date'];
            $blog->blog_heading = $request['blog_heading'];
            $blog->blog_description = $request['blog_description'];
            $blog->save();
            return redirect('/dashboard')->with(["blog_success" => "Record updated successfully!!"]);
        } else {
            return redirect('/dashboard');
        }
    }
    //delete blog
    public function deleteBlog($blog_id)
    {
        $blog = Blog::find($blog_id);
        if (!is_null($blog)) {
            $blog->delete();
        }
        return redirect('/dashboard');
    }

    // projects section
    public function uploadProject(Request $request)
    {
        $project = Project::find('1');
        if (is_null($project)) {
            $project = new Project;

            //    validating the information
            $request->validate(
                [
                    'project_banner' => 'required|image|max:8000',
                    'project_image' => 'required|image|max:8000',
                    'project_heading' => 'required',
                    'project_description' => 'required',
                    'project_link' => 'required',
                ]
            );

            if (!is_null($project)) {
                //insert data
                if ($request->hasFile("project_banner"))
                    $project->project_banner = $request->file("project_banner")->store("img", "public");
                if ($request->hasFile("project_image"))
                    $project->project_image = $request->file("project_image")->store("img", "public");
                $project->project_heading = $request['project_heading'];
                $project->project_description = $request['project_description'];
                $project->project_link = $request['project_link'];
                $project->save();
                return redirect('/dashboard')->with(["project_success" => "Project inserted successfully!!"]);
            } else {
                return redirect('/dashboard');
            }
        } else {
            $request->validate(
                [
                    'project_banner' => 'required|image|max:8000',
                    'project_image' => 'required|image|max:8000',
                    'project_heading' => 'required',
                    'project_description' => 'required',
                    'project_link' => 'required',
                ]
            );

            if (!is_null($project)) {
                //insert data
                if ($request->hasFile("project_banner"))
                    $project->project_banner = $request->file("project_banner")->store("img", "public");
                if ($request->hasFile("project_image"))
                    $project->project_image = $request->file("project_image")->store("img", "public");
                $project->project_heading = $request['project_heading'];
                $project->project_description = $request['project_description'];
                $project->project_link = $request['project_link'];
                $project->save();
                return redirect('/dashboard')->with(["project_success" => "Project inserted successfully!!"]);
            }
        }
    }
    //subscriber
    public function subscribe(Request $request)
    {
        $subscriber = new Subscribe;
        // $request->validate(
        //     [
        //         'email'=>'required'
        //     ]
        //     );

        if (!is_null($subscriber)) {
            $sub = $subscriber::all();
            $count = 0;
            foreach ($sub as $entry) {
                if ($entry->email == $request['email']) {
                    $count = 1;
                    return redirect('/')->with(["xsub" => "you are already subscribed!!"]);
                }
            }
            if ($count == 0) {
                $subscriber->email = $request['email'];
                $subscriber->save();
                $this->subcribedNotificationToUser($subscriber);
                return redirect('/')->with(["sub" => "Thank for subscribing us!!"]);
            }
            // return redirect('/dashboard')->with(["contact_success" => "Contact inserted successfully!!"]);
        } else {
            return redirect('/');
        }
    }

    //checked email
    public function selectedBroadcast(Request $request)
    {
        $checked = $request->input('active');
        $subscriber = Subscribe::find($checked);
        return view('selectedBrodcast', compact('subscriber'));
    }
    public function sendCheckedAds(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'content' => 'required',
        ]);
        $emails = $request->input('emails');
        $subject = $request['subject'];
        $content = $request['content'];
        $data = compact('subject', 'content');
        foreach ($emails as $mail) {
            Mail::to($mail)->send(new sendSelectedAds($data));
        }
        return redirect('/dashboard')->with(['done' => 'Mail send successfully']);
    }
    //contacts
    public function uploadContact(Request $request)
    {
        $contact = Contact::find('1');
        if (is_null($contact)) {
            $contact = new Contact;
            $request->validate(
                [
                    'open_at' => 'required',
                    'close_at' => 'required',
                    'contact_number' => 'required',
                    'contact_email' => 'required|email',
                    'contact_location' => 'required',
                ]
            );

            if (!is_null($contact)) {
                //insert data
                $contact->open_at = $request['open_at'];
                $contact->close_at = $request['close_at'];
                $contact->contact_number = $request['contact_number'];
                $contact->contact_email = $request['contact_email'];
                $contact->contact_location = $request['contact_location'];
                $contact->save();
                return redirect('/dashboard')->with(["contact_success" => "Contact inserted successfully!!"]);
            } else {
                return redirect('/dashboard');
            }
        } else {
            $request->validate(
                [
                    'open_at' => 'required',
                    'close_at' => 'required',
                    'contact_number' => 'required',
                    'contact_email' => 'required|email',
                    'contact_location' => 'required',
                ]
            );

            if (!is_null($contact)) {
                //insert data
                $contact->open_at = $request['open_at'];
                $contact->close_at = $request['close_at'];
                $contact->contact_number = $request['contact_number'];
                $contact->contact_email = $request['contact_email'];
                $contact->contact_location = $request['contact_location'];
                $contact->save();
                return redirect('/dashboard')->with(["contact_success" => "Contact inserted successfully!!"]);
            } else {
                return redirect('/dashboard');
            }
        }
    }


    public function uploadUserInquiry(Request $request)
    {
        //    validating the information
        $request->validate(
            [
                'name' => 'required|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|email',
                'subject' => 'required',
                'cv' => 'required',
                'message' => 'required'
            ]
        );

        //insert data
        $inquiry = new UserInquiry;
        $inquiry->name = $request['name'];
        $inquiry->email = $request['email'];
        $inquiry->subject = $request['subject'];
        if ($request->hasFile("cv"))
            $inquiry->cv = $request->file("cv")->store("cv", "public");
        $inquiry->message = $request['message'];
        $inquiry->save();
        $this->sendMail($inquiry);
        $this->sendMailToAdmin($inquiry);
        return redirect('/')->with(["inquiry_success" => "send successfully!!"]);
    }

    public function sendMail($data)
    {
        Mail::to($data->email)->send(new ContactMail($data));
    }
    public function sendMailToAdmin($data)
    {
        $admin = User::first();
        Mail::to($admin->email)->send(new AdminMail($data));
    }

    public function subcribedNotificationToUser($data)
    {
        Mail::to($data->email)->send(new SubscribeNotificationUser($data));
    }
    public function sendAds(Request $request)
    {
        $broadcast = Broadcast::find('1');
        if (is_null($broadcast)) {
            $broadcast = new Broadcast;
            $request->validate(
                [
                    'subject' => 'required',
                    'content' => 'required',
                ]
            );

            if (!is_null($broadcast)) {
                //insert data
                $broadcast->subject = $request['subject'];
                $broadcast->content = $request['content'];
                $broadcast->save();
                $this->broadcastMail($broadcast);
                return redirect('/dashboard')->with(["sendAds" => "send successfully!!"]);
            } else {
                return redirect('/dashboard');
            }
        } else {
            $request->validate(
                [
                    'subject' => 'required',
                    'content' => 'required',
                ]
            );

            if (!is_null($broadcast)) {
                //insert data
                $broadcast->subject = $request['subject'];
                $broadcast->content = $request['content'];
                $broadcast->save();
                $this->broadcastMail($broadcast);
                return redirect('/dashboard')->with(["sendAds" => "send successfully!!"]);
            } else {
                return redirect('/dashboard');
            }
        }
    }

    public function broadcastMail($data)
    {
        $subscribers = Subscribe::all();
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new SendAds($data));
        }
    }

    //block and unblock user
    public function blockUser($id)
    {
        $user = User::find($id);
        if ($user->role_id == '1') {
            return redirect('/dashboard')->with(["info" => "Admin Can't be blocked !!"]);
        } else {
            $user->status = '2';
            $user->update();
            return redirect('/dashboard')->with(["success" => "user has been blocked  !!"]);
        }
    }
    public function unblockUser($id)
    {
        $user = User::find($id);
        if ($user->role_id == '1') {
            return redirect('/dashboard')->with(["info" => "Something Wrong here !!"]);
        } else {
            $user->status = '1';
            $user->update();
            return redirect('/dashboard')->with(["success" => "user has been Unblocked  !!"]);
        }
    }

    // reject and publish blogs
    public function publishUser($id)
    {
        $blog = Blog::find($id);
        if (Auth::user()->role_id != '1') {
            return redirect('/dashboard')->with(["info" => "Only admin can update request"]);
        } else {
            $blog->status = '1';
            $blog->update();
            return redirect('/dashboard')->with(["success" => "Blog published successful !!"]);
        }
    }
    public function rejectUser($id)
    {
        $blog = Blog::find($id);
        if (Auth::user()->role_id != '1') {
            return redirect('/dashboard')->with(["info" => "Only admin can update request"]);
        } else {
            $blog->status = '2';
            $blog->update();
            return redirect('/dashboard')->with(["success" => "The blog is rejected  !!"]);
        }
    }
    public function totalData()
    {
        $subscriber = Subscribe::all();
    }
}
