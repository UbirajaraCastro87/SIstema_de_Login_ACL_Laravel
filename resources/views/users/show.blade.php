@extends('layouts.tabler')

@section('content')
<!-- Cabeçalho da Página -->
<div class="page-header d-print-none mb-4">
    <div class="row align-items-center">
        <div class="col">
            <h2 class="page-title">Detalhes do Usuário</h2>
            <div class="text-muted mt-1">Informações cadastradas, perfil e permissões de acesso.</div>
        </div>
        <div class="col-auto ms-auto d-print-none">
            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                <i class="ti ti-arrow-left me-1"></i> Voltar para a lista
            </a>
        </div>
    </div>
</div>

<div class="row row-cards">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Dados do Cadastro</h3>
            </div>
            
            <div class="card-body">
                <div class="datagrid">
                    <!-- ID -->
                    <div class="datagrid-item">
                        <div class="datagrid-title">ID</div>
                        <div class="datagrid-content">{{ $user->id }}</div>
                    </div>

                    <!-- Nome -->
                    <div class="datagrid-item">
                        <div class="datagrid-title">Nome</div>
                        <div class="datagrid-content font-weight-bold">{{ $user->name }}</div>
                    </div>

                    <!-- Email -->
                    <div class="datagrid-item">
                        <div class="datagrid-title">Email</div>
                        <div class="datagrid-content">{{ $user->email }}</div>
                    </div>

                    <!-- Perfil (Roles) -->
                    <div class="datagrid-item">
                        <div class="datagrid-title">Perfil (Role)</div>
                        <div class="datagrid-content">
                            @forelse($user->getRoleNames() as $role)
                                <span class="badge bg-blue-lt me-1">{{ $role }}</span>
                            @empty
                                <span class="text-muted italic">Nenhum perfil atribuído</span>
                            @endforelse
                        </div>
                    </div>

                    <!-- Permissões -->
                    <div class="datagrid-item col-span-2">
                        <div class="datagrid-title mb-2">Permissões Diretas / Herdadas</div>
                        <div class="datagrid-content">
                            <div class="d-flex flex-wrap gap-1">
                                @forelse($user->getAllPermissions() as $permission)
                                    <span class="badge bg-green-lt">
                                        <i class="ti ti-check me-1"></i> {{ $permission->name }}
                                    </span>
                                @empty
                                    <span class="text-muted italic">Sem permissões registradas</span>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Rodapé com Botões de Ação -->
            <div class="card-footer d-flex align-items-center justify-content-between">
                <a href="{{ route('users.index') }}" class="btn btn-link link-secondary ps-0">
                    <i class="ti ti-arrow-left me-1"></i> Voltar
                </a>

                @can('usuarios.editar')
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                        <i class="ti ti-edit me-1"></i> Editar Usuário
                    </a>
                @endcan
            </div>
        </div>
    </div>
</div>
@endsection