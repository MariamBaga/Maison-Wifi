@extends('adminlte::page')

@section('title', 'Messages reçus')

@section('content_header')
    <h1>📨 Messagerie - Messages reçus</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header bg-primary">
            <h3 class="card-title">Liste des messages reçus</h3>
        </div>

        <div class="card-body">
            @if($contacts->isEmpty())
                <div class="alert alert-info text-center">
                    Aucun message reçu pour le moment.
                </div>
            @else
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Email</th>
                            <th>Objet</th>
                            <th>Message</th>
                            <th>Lu</th>
                            <th>Date d’envoi</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr @if(!$contact->read) class="table-warning" @endif>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ Str::limit($contact->message, 50) }}</td>
                                <td>
                                    @if($contact->read)
                                        <span class="badge bg-success">Lu</span>
                                    @else
                                        <span class="badge bg-danger">Non lu</span>
                                    @endif
                                </td>
                                <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('contacts.show', $contact->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ce message ?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@stop
