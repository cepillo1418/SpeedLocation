@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4">
       
        <div class="container">
            <h2>Page entretiens</h2>
             <!-- Button trigger modal -->
        <a href="/entretien/create" class="btn btn-outline-primary float-start">
            Ajouter Entretien
        </a>
            <table id="DataTable_entretiens" class="table table-secondary  mt-2 table-hover table-striped dataTable table-responsive" style="width: 100%">
                <thead class="border-1 border-bottom border-white">
                <tr>
                    <th>Nom garage</th>
                    <th>Type</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Immatriculation</th>
                    <th>Notes</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($entretiens as $datas)
                    <tr data-voiture="{{$datas->id}}">
                        <td>{{$datas->nom}}</td>
                        <td>{{$datas->type}}</td>
                        <td>{{$datas->montant."€"}}</td>
                        <td>{{date('d/m/Y', strtotime($datas->date))}}</td>
                        <td>{{(isset($datas->immatriculation))? $datas->immatriculation : 'Aucune voiture'}}</td>
                        <td>
                            <div class="noteSupp">
                                {{$datas->note}}
                            </div>
                        </td>
                        <td class="tdBtn">
                            <div class="divBtnTab">
                                <a class="btn btn-outline-primary editButton text-white"  href="/entretien/edit/{{$datas->id}}"><i class=" fa-p-color fa-solid fa-pencil "></i></a>
                                <button class="btn btn-outline-danger delButton" data-voiture="{{$datas->id}}"><i class="fa-solid fa-trash-can"></i></button>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('js/entretien.js') }}" defer></script>
@endsection
