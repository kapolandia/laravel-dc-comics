<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comic;
use Illuminate\Support\Facades\Validator;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $this->validation($data);

        $comic = new Comic();
        $comic->fill($data);
        $comic->save();

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function show(Comic $comic)
    {
        $data = [
            'comic' => $comic
        ];

        return view('comics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::findOrFail($id);

        $data = [
            'comic' => $comic
        ];
        
        return view('comics.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $formData = $request->all();
        $this->validation($formData);

        // Proceeds after validation
        $comic = Comic::findOrFail($id);

        $comic->fill($formData);
        $comic->save();

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comic  $comic
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::findOrFail($id);
        $comic->delete();

        return redirect()->route('comics.index');
    }


    // Validation for "store" and "update" methods
    private function validation($data) {
        $validator = Validator::make(
            $data,
            [
                'title' => 'required|min:5|max:50',
                'thumb' => 'required|max:250',
                'description' => 'required|min:10|max:2000',
                'price' => 'required|numeric|min:0|max:9999.99',
                'series' => 'required|min:5|max:2000',
                'type' => 'required|max:20',
                'sale_date' => 'required|date'
            ],
            [
                'title.required' => 'Il titolo è obbligatorio',
                'title.min' => 'Il titolo deve avere almeno 5 caratteri',
                'title.max' => 'Il titolo non può avere più di 50 caratteri',
                
                'thumb.required' => 'Il campo immagine è obbligatorio',
                'thumb.max' => 'Il campo immagine non può avere più di 250 caratteri',
                
                'description.required' => 'La descrizione è obbligatoria',
                'description.min' => 'La descrizione deve avere almeno 10 caratteri',
                'description.max' => 'La descrizione non può avere più di 2000 caratteri',
                
                'price.required' => 'Il prezzo è obbligatorio',
                'price.numeric' => 'Il prezzo deve essere un numero',
                'price.min' => 'Il prezzo deve essere almeno 0',
                'price.max' => 'Il prezzo non può essere maggiore di 9999.99',
                
                'series.required' => 'Il tipo di serie è obbligatorio',
                'series.min' => 'Il tipo di serie deve avere almeno 5 caratteri',
                'series.max' => 'Il tipo di serie non può avere più di 2000 caratteri',
                
                'type.required' => 'Il tipo è obbligatorio',
                'type.max' => 'Il tipo non può avere più di 20 caratteri',
                
                'sale_date.required' => 'La data di vendita è obbligatoria',
                'sale_date.date' => 'La data di vendita deve essere una data valida'
            ]
        )->validate();
    
        // Log the sale date to the Laravel log
        Log::info('Sale date submitted: ' . $data['sale_date']);
    
        return $validator;
    }
    

}
