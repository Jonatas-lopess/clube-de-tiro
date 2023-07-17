<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Service;
use App\Models\SiteContent;
use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\DataTables;

class PainelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the users section content.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function usersSectionContent()
    {
        return view('painel.usuarios', ['page' => 'users']);
    }

    /**
     * Show the home section content.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homeSectionContent()
    {
        return view('painel.home', ['page' => 'home']);
    }

    /**
     * Show the about us section content.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function aboutUsSectionContent()
    {
        $text = SiteContent::where('page', 'about')->first();
        return view('painel.about_us', ['page' => 'about', 'text' => $text->content]);
    }

    /**
     * Show the contact section content.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function contactSectionContent()
    {
        $number = SiteContent::where([['page', '=', 'contact'], ['type', '=', 'number']])->first();
        $email = SiteContent::where([['page', '=', 'contact'], ['type', '=', 'email']])->first();
        $qrcode = SiteContent::where([['page', '=', 'contact'], ['type', '=', 'image']])->first();
        return view('painel.contact', [
            'page' => 'contact',
            'number' => $number->content,
            'email' => $email->content,
            'qrcode' => $qrcode->content
        ]);
    }

    /**
     * Show the service section content.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function serviceSectionContent()
    {
        return view('painel.service', ['page' => 'service']);
    }


    /**
     * Return all users datatable.
     *
     * @return \Yajra\DataTables\DataTables
     */
    public function getUsers()
    {
        $query = User::all();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
                $actionBtn2 = '-';

                if($row['id'] == 1) {
                    return $actionBtn2;
                }

                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Return all carousel images datatable.
     *
     * @return \Yajra\DataTables\DataTables
     */
    public function getCarouselImages()
    {
        $query = SiteContent::where('page','home')->get();

        return DataTables::of($query)
            ->addIndexColumn()
            ->addColumn('action', function ($row){
                $actionBtn = '<a href="javascript:void(0)" class="view btn btn-primary btn-sm"><i class="fa fa-eye"></i></a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function getServices()
    {
        $services = Service::all();

        return DataTables::of($services)
            ->addColumn('action', function (){
                return '<a href="javascript:void(0)" class="edit btn btn-success btn-sm"><i class="fa fa-edit"></i></a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function deleteService(Request $request)
    {
        try {
            $service = Service::find($request->service);
            $service->delete();

            return redirect()->route('painel.home');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function salvarService(Request $request)
    {
        try {
            $service = [
                'content' => $request->name,
                'description' => $request->description
            ];

            Service::create($service);

            return redirect()->route('painel.home');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function updateService(Request $request)
    {
        try {
            $service = SiteContent::find($request->service);

            $service->name = $request->name;
            $service->description = $request->description;

            $service->save();

            return redirect()->route('painel.home');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function salvarAboutUs(Request $request)
    {
        try {
            $content = SiteContent::where('page', 'about')->first();

            $content->content = $request->content;

            $content->save();

            return redirect()->route('painel.home');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function salvarContact(Request $request)
    {
        try {
            $number = SiteContent::where([['page', '=', 'contact'], ['type', '=', 'number']])->first();
            $email = SiteContent::where([['page', '=', 'contact'], ['type', '=', 'email']])->first();

            if ($number->content != $request->contact_number) {
                $number->content = $request->contact_number;
                $number->save();
            }

            if ($email->content != $request->contact_email) {
                $email->content = $request->contact_email;
                $email->save();
            }

            return redirect()->route('painel.home');
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function uploadImage(Request $request)
    {
        $imagename = $request->imagem;

        if (!empty($imagename)) {
            $img = TemporaryFile::where('filename', $imagename)->first();

            $img->delete();
            File::move(public_path('images/tmp/'.$imagename), public_path('images/'.$imagename));

            SiteContent::create([
                'content' => $imagename,
                'type' => 'image',
                'page' => $request->page
            ]);
        }

        return redirect()->route('painel.home');
    }

    public function updateQRCode(Request $request)
    {
        $imagename = $request->imagem;
        $qrcode = SiteContent::where([['page', '=', 'contact'], ['type', '=', 'image']])->first();

        if (!empty($imagename)) {
            $img = TemporaryFile::where('filename', $imagename)->first();

            $img->delete();
            File::delete(public_path('images/'.$qrcode->content));
            File::move(public_path('images/tmp/'.$imagename), public_path('images/'.$imagename));

            $qrcode->content = $imagename;
            $qrcode->save();
        }

        return redirect()->route('painel.home');
    }

    public function uploadTemporaryImage(Request $request)
    {
        try {
            if ($request->hasFile('imagem')) {
                $tmpimg = $request->file('imagem');
                $imagename = $tmpimg->getClientOriginalName();
                $tmpimg->storeAs('tmp', $imagename);
    
                TemporaryFile::create(['filename' => $imagename]);
    
                return $imagename;
            }
    
            return '';
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteTemporaryImage(Request $request)
    {
        try {
            $imagename = $request->getContent();

            if (!empty($imagename)) {
                $img = TemporaryFile::where('filename', $imagename)->first();

                $img->delete();
                File::delete(public_path('images/tmp/'.$imagename));
    
                return $imagename;
            }
    
            return '';
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function deleteImage(Request $request)
    {
        try {
            $imagem = SiteContent::find($request->imagem);

            $imagem->delete();
            File::delete(public_path('images/'.$imagem->content));

            return redirect()->route('painel.home');
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
