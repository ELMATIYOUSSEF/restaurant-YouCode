<?php

namespace App\Http\Controllers;

// use Illuminate\Validation\Rules\File;
use App\Http\Requests\PlatFormRequest;
use App\Models\Plat;

class PlatlController extends Controller
{
    
    // 
    public function TrashedPlat(){
        $plats = Plat::onlyTrashed()->orderBy('id','DESC')->paginate(10);
        return view('plats.trash-list',['plats'=>$plats]);
    }

    //
    public function restore($id){
        
        $plat = Plat::withTrashed()->findOrFail($id);
        if($plat!=null){
            
            $plat->restore();
        }
        return redirect()
        ->route('home')
        ->with('success', 'plat restored successfully!');
    }
    // 
    public function DeleteForce($id){
        
        $plat = Plat::withTrashed()->findOrFail($id);
        if($plat!=null){
            
            $plat->forceDelete();
        }
        return redirect()
        ->route('home')
        ->with('success', 'plat deleted successfully!');
    }
    public function create()
    {
        //
        return view('plats.create');
    }

    // 

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

    // 

    public function show(Plat $plat)
    {
        return view('plats.show',['plat' => $plat]);
    }

    // 

    public function edit(Plat $plat)
    {
        return view('plats.edit',['plat' => $plat]);
    }

    // 

    public function update(PlatFormRequest $request, Plat $plat)
    {
         $image= $request->file('image');
        //         if($image != null){
        //                $validated= $request->validate([
        //                     'image' => [
        //                         File::types(['png', 'jpg', 'pdf','jfif'])     
        //                     ],
        //                             'title' => 'required',
        //                             'description' => ['required','min:10'],
        //                         ]);
        //                         $validated['image'] = $request->file('image')->store('image', 'public');
                            
        //                     $plat->update($validated);
        //                 }
        //                 else{
        //                    $validated= $request->validate([
        //                                 'title' => 'required',
        //                                 'description' => ['required','min:10'],
        //                             ]);
        //                     $plat->update($validated);
        //                 }
                        $validated = $request->validated();
                        if($image!= null){
                            $validated['image'] = $request->file('image')->store('image', 'public');
                            
                            $plat->update($validated);
                        }
                        else{
                            $plat->update($validated);
                        }
                        

                return redirect()
                    ->route('plats.show', [$plat])
                    ->with('success', 'Plat is updated!');
    }

    //

    public function destroy(Plat $plat)
    {
        $plat-> delete();
        return redirect()
        ->route('home')
        ->with('success', 'plat has been deleted !!');
    }
}
