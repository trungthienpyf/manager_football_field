<?php

namespace App\Http\Controllers;

use App\Enums\PitchStatusEnum;
use App\Models\Pitch;
use Illuminate\Http\Request;

class PitchIndexController extends Controller
{
    public function index()
    {
        $pitch = Pitch::all();
        $status = PitchStatusEnum::getArrayView();

        return view('user.welcome', [
            'pitch' => $pitch,
            'status'=>$status
        ]);
    }

    public function addToCard(request $request,Pitch $id)
    {

    }

    public function getSize11()
    {
        $get_size_11=Pitch::query()
            ->where('size','=','2')
            ->orderBy('created_at','DESC')
            ->get();
        return response()->json([
            'success'=>true,
            'data'=>$get_size_11,
        ]);
    }
}
