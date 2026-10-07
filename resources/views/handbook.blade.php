@extends('layouts.app')

@section('title', 'Beranda LSPD - Mobile Data Computer (MDC)')

@section('content')
  @include('tabs.beranda')
  @include('tabs.chain-of-command')
  @include('tabs.komunikasi-radio')
  @include('tabs.prosedur-taktis')
  @include('tabs.rules')
  @include('tabs.weapon-classes')
  @include('tabs.incident-command')
  @include('tabs.proses-hukum')
  @include('tabs.alur-court-verdict')
  @include('tabs.penal-code-cheat')
  @include('tabs.laporan-patroli')
  @include('tabs.kualifikasi-promosi')
@endsection

@push('scripts')
<script>
  window.DB_OFFICERS = @json($officers);
  window.DB_PENAL_CODES = @json($penalCodes);
  window.DB_RULES = @json($rules);
  window.DB_TACTICALS = @json($tacticals);
</script>
@endpush