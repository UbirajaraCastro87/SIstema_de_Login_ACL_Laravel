@extends('layouts.tabler')

@section('content')
<!-- Cabeçalho da Página -->
<div class="page-header d-print-none mb-4">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">Editar Usuário</h2>
            <div class="text-muted mt-1">Atualize as informações cadastrais e o perfil de acesso.</div>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                <i class="ti ti-arrow-left me-1"></i> Voltar
            </a>
        </div>
    </div>
</div>

<div class="row row-cards">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <form action="{{ route('users.update', $user->id) }}" method="POST" autocomplete="off">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <!-- Nome -->
                    <div class="mb-3">
                        <label class="form-label required">Nome</label>
                        <input type="text" 
                               name="name" 
                               value="{{ old('name', $user->name) }}" 
                               class="form-control @error('name') is-invalid @enderror" 
                               required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label required">Email</label>
                        <input type="email" 
                               name="email" 
                               value="{{ old('email', $user->email) }}" 
                               class="form-control @error('email') is-invalid @enderror" 
                               required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nova Senha (Opcional) -->
                    <div class="mb-3">
                        <label class="form-label">
                            Nova Senha 
                            <span class="form-label-description">deixe em branco para manter a atual</span>
                        </label>
                        <input type="password" 
                               name="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               placeholder="••••••••">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Perfil (Role - Spatie) -->
                    <div class="mb-3">
                        <label class="form-label required">Perfil de Acesso</label>
                        <select name="role" class="form-select @error('role') is-invalid @enderror" required>
                            <option value="">Selecione um perfil...</option>
                            @foreach($roles as $role)
                                <option value="{{ $role->name }}" 
                                    {{ (old('role') ?? ($user->roles->first()->name ?? '')) == $role->name ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer d-flex align-items-center justify-content-between">
                    <a href="{{ route('users.index') }}" class="btn btn-link link-secondary ps-0">
                        Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="ti ti-device-floppy me-1"></i> Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection