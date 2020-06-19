@extends('layouts.basetemplate.index.blade.php')

@section('content')
    <form method="post" action="{{ route('capacitacoes.materiaisapoio.create.do') }}">
        @csrf
        <div class="form-group">
            <label for="material-title">Titulo da Mini capacitação</label>
            <input
                name="titulo"
                value="{{ old('titulo') }}"
                placeholder="Ex: Como fazer tortinhas de cereja"
                type="titulo"
                id="material-title"
                class="form-control @error('titulo') is-invalid @enderror"
                required
            >
        </div>

        <div class="form-group">
            <label for="material-desc">Descrição breve</label>
            <textarea
                name="descricao"
                id="material-desc"
                class="form-control @error('descricao') is-invalid @enderror"
                placeholder="Ex: Tutorial de como preparar deliciosas tortinhas de cereja"
                required
            >{{ old('descricao') }}</textarea>
        </div>

        <div class="form-group">
            <label for="material-content">Conteudo</label>
            <textarea
                name="conteudo"
                id="material-content"
                class="form-control @error('conteudo') is-invalid @enderror "
                rows="10"
                required
            >{{ old('conteudo') }}</textarea>
        </div>

        <div class="form-group justify-content-end d-flex">
            <a href="{{ route('capacitacoes.materiaisapoio') }}" class="btn btn-danger">
                <i class="fas fa-times"></i>
                <span>Cancelar</span>
            </a>
            <div class="btn-group">
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-eye"></i>
                    <span>Preview</span>
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-correct"></i>
                    <span>Salvar</span>
                </button>
            </div>
        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(session()->get("success-message"))
        <div class="alert alert-success">
            <p>{{ session()->get('success-message') }}</p>
        </div>
    @endif

@endsection
