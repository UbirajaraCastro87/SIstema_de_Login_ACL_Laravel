@extends('layouts.tabler')

@section('content')
<!-- Cabeçalho da Página -->
<div class="page-header d-print-none mb-4">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">Detalhes do Perfil</h2>
            <div class="text-muted mt-1">Visualização das permissões e métricas do perfil.</div>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">
                <i class="ti ti-arrow-left me-1"></i> Voltar
            </a>
        </div>
    </div>
</div>

<div class="row row-cards">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Informações do Perfil</h3>
            </div>
            
            <div class="card-body">
                <div class="datagrid">
                    <!-- ID -->
                    <div class="datagrid-item">
                        <div class="datagrid-title">ID</div>
                        <div class="datagrid-content font-monospace">#{{ $role->id }}</div>
                    </div>

                    <!-- Nome do Perfil -->
                    <div class="datagrid-item">
                        <div class="datagrid-title">Nome do Perfil</div>
                        <div class="datagrid-content">
                            <span class="badge bg-blue-lt fs-3">{{ $role->name }}</span>
                        </div>
                    </div>

                    <!-- Total de Usuários Atribuídos -->
                    <div class="datagrid-item">
                        <div class="datagrid-title">Total de Usuários Atribuídos</div>
                        <div class="datagrid-content">
                            <span class="avatar avatar-xs rounded me-2 bg-green-lt">
                                <i class="ti ti-users"></i>
                            </span>
                            <strong>{{ $role->users()->count() }}</strong> usuário(s)
                        </div>
                    </div>

                    <!-- Permissões Associadas -->
                    <div class="datagrid-item col-12">
                        <div class="datagrid-title mb-2">Permissões Associadas</div>
                        <div class="datagrid-content">
                            <div class="d-flex flex-wrap gap-1">
                                @forelse($role->permissions as $permission)
                                    <span class="badge bg-green-lt border border-green-subtle">
                                        <i class="ti ti-key me-1"></i> {{ $permission->name }}
                                    </span>
                                @empty
                                    <span class="text-muted italic fs-5">Nenhuma permissão associada a este perfil.</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('roles.index') }}" class="btn btn-link link-secondary ps-0">
                    &larr; Voltar para a lista de perfis
                </a>

                @can('perfis.editar')
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-warning">
                        <i class="ti ti-pencil me-1"></i> Editar Perfil
                    </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection