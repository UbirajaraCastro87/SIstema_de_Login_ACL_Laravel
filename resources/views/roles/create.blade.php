@extends('layouts.tabler')

@section('content')
<!-- Cabeçalho da Página -->
<div class="page-header d-print-none mb-4">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">Cadastrar Novo Perfil</h2>
            <div class="text-muted mt-1">Crie um perfil de acesso e atribua as permissões correspondentes.</div>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">
                <i class="ti ti-arrow-left me-1"></i> Voltar
            </a>
        </div>
    </div>
</div>

<div class="row row-cards">
    <div class="col-md-10 mx-auto">
        <div class="card">
            <form action="{{ route('roles.store') }}" method="POST" autocomplete="off">
                @csrf

                <div class="card-body">
                    <!-- Nome do Perfil -->
                    <div class="mb-4">
                        <label for="name" class="form-label required">Nome do Perfil</label>
                        <input type="text" 
                               name="name" 
                               id="name" 
                               value="{{ old('name') }}"
                               placeholder="Ex: Administrador, Gerente, Editor" 
                               class="form-control @error('name') is-invalid @enderror" 
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <hr class="my-4">

                    <!-- Atribuir Permissões -->
                    <div class="mb-3">
                        <label class="form-label font-weight-bold mb-3">Atribuir Permissões aos Módulos</label>
                        
                        <div class="row g-3">
                            @foreach($permissions as $permission)
                                <div class="col-sm-6 col-md-4">
                                    <label class="form-selectgroup-item">
                                        <input type="checkbox" 
                                               name="permissions[]" 
                                               value="{{ $permission->name }}" 
                                               class="form-selectgroup-input"
                                               {{ is_array(old('permissions')) && in_array($permission->name, old('permissions')) ? 'checked' : '' }}>
                                        <span class="form-selectgroup-label d-flex align-items-center p-3">
                                            <span class="me-2">
                                                <i class="ti ti-key fs-3 text-muted"></i>
                                            </span>
                                            <span class="text-truncate">{{ $permission->name }}</span>
                                        </span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        @error('permissions')
                            <div class="text-danger fs-5 mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <!-- Rodapé com Botões -->
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('roles.index') }}" class="btn btn-link link-secondary ps-0">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-device-floppy me-1"></i> Salvar Perfil
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection