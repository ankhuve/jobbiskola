<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    protected $request;


    /**
     * Create a new controller instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'cv' => 'max:3072|mimes:doc,docx,pdf,rtf,txt',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // ladda upp CV om vi har något
        if (array_key_exists('cv', $data)) {
            $fileName = $this->handleCVUpload($this->request);
            $data['cv_path'] = $fileName;
        } else{
            $data['cv_path'] = null;
        }

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'cv_path' => $data['cv_path'],
        ]);
    }


    /**
     *
     * Handle a CV upload request.
     *
     * @param Request $request
     * @return bool
     * @internal param Request $request
     */
    public function handleCVUpload(Request $request)
    {
        if ($request->file('cv')->isValid()) {

            $pathToCVFolder = 'user-cvs/';

            // prepare for upload
            $file = $request->file('cv');
            $userName = str_slug($request->get('name'));
            $disk = Storage::disk('s3');
            $ext = $file->guessExtension();
            $fileName = $userName . '-' . time() . '-CV.' . $ext;

            // Ladda upp filen
            $disk->put($pathToCVFolder . $fileName, file_get_contents($file->getRealPath()));

            return $fileName;

        } else{
            // failed to validate upload, broken file?
            return null;
        }
    }
}
