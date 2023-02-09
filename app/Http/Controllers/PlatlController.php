<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rules\File;
use App\Http\Requests\PlatFormRequest;
use App\Models\Plat;
use Illuminate\Http\Request;

class PlatlController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('plats.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlatFormRequest $request)
    {
        //
        $validated = $request->validated();

        // Store image in the public directory
        $validated['image'] = $request->file('image')->store('image', 'public');

        $plat = Plat::create($validated);

        return redirect()
            ->route('plats.show', [$plat])
            ->with('success', 'plat is submitted! Title: ' . $plat->title . ' Description: ' . $plat->description);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plat $plat)
    {
        return view('plats.show',['plat' => $plat,]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plat $plat)
    {
        return view('plats.edit',['plat' => $plat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plat $plat)
    {
        $image= $request->file('image');
                if($image != null){
                       $validated= $request->validate([
                            'image' => [
                                File::types(['png', 'jpg', 'pdf','jfif'])     
                            ],
                                    'title' => 'required',
                                    'description' => ['required','min:10'],
                                ]);
                                $validated['image'] = $request->file('image')->store('image', 'public');
                            
                            $plat->update($validated);
                        }
                        else{
                           $validated= $request->validate([
                                        'title' => 'required',
                                        'description' => ['required','min:10'],
                                    ]);
                            $plat->update($validated);
                        }
                
                        

                return redirect()
                    ->route('plats.show', [$plat])
                    ->with('success', 'Plat is updated!');
    }
//     public function update(Request $request, Plat $plat)
// {
//     $image= $request->file('image');
//     if($image != null){
//         $validated= $request->validate([
//             'image' => [
//                 'required',
//                 'mimes:jpeg,png,jpg,gif,svg',
//                 'max:2048'
//             ],
//             'title' => 'required',
//             'description' => ['required','min:10'],
//         ]);
//         $plat->image = $request->file('image')->store('image', 'public');
//         $plat->title = $request->input('title');
//         $plat->description = $request->input('description');
//         $plat->update($validated);
//     }
//     else{
//         $validated= $request->validate([
//             'title' => 'required',
//             'description' => ['required','min:10'],
//         ]);
//         $plat->title = $request->input('title');
//         $plat->description = $request->input('description');
//         $plat->update($validated);
//     }
//     return redirect()
//         ->route('plats.show', [$plat])
//         ->with('success', 'Plat is updated!');
// }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plat $plat)
    {
        $plat-> delete();
        return redirect()
        ->route('home')
        ->with('success', 'plat has been deleted !!');
    }
}
