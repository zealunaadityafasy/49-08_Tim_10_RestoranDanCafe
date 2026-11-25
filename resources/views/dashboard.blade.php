
@extends('layouts.app')

@section('title', 'Dashboard')

@section('heading', 'Dashboard')

@section('content')

<div style="margin-bottom: 30px;">
    <h2 style="color: #142b4a; margin-bottom: 10px;">
        Selamat Datang di Management System
    </h2>
    <p style="color: #64748b;">
        Kelola data restoran melalui sistem manajemen terpadu.
    </p>
</div>

<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">

    <div style="background: white; padding: 25px; border-radius: 10px;">
        <h3 style="color: #142b4a;">Supplier Bahan Baku</h3>
        <p style="color: #64748b; margin: 12px 0;">Kelola data supplier.</p>
        <a href="/supplier" style="color: #168bc1; text-decoration: none; font-weight: bold;">
            Buka Modul →
        </a>
    </div>

    <div style="background: white; padding: 25px; border-radius: 10px;">
        <h3 style="color: #142b4a;">Menu</h3>
        <p style="color: #64748b; margin: 12px 0;">Kelola menu restoran.</p>
        <span style="color: #94a3b8;">Segera tersedia</span>
    </div>

    <div style="background: white; padding: 25px; border-radius: 10px;">
        <h3 style="color: #142b4a;">Meja & Area</h3>
        <p style="color: #64748b; margin: 12px 0;">Kelola meja dan area restoran.</p>
        <span style="color: #94a3b8;">Segera tersedia</span>
    </div>

    <div style="background: white; padding: 25px; border-radius: 10px;">
        <h3 style="color: #142b4a;">Staff</h3>
        <p style="color: #64748b; margin: 12px 0;">Kelola data pegawai.</p>
        <span style="color: #94a3b8;">Segera tersedia</span>
    </div>

</div>

@endsection
