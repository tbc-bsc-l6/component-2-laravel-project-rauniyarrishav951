@php
    $pagetitle = 'contactpage';
@endphp

@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<style>
    body {
        background: #8b64bbff; 
        padding: 60px 0;
        font-family: Inter, sans-serif;
    }

    .contact-wrapper {
        max-width: 950px;
        margin: auto;
    }

    .contact-card {
        background: #fff;
        border-radius: 22px;
        display: flex;
        overflow: hidden;
        box-shadow: 0 8px 40px rgba(0,0,0,0.12);
    }

    .left-side {
        width: 55%;
        padding: 40px 45px;
    }

    .left-side h2 {
        margin-bottom: 5px;
        font-weight: 700;
    }

    .left-side small {
        color: #777;
    }

    label {
        display: block;
        margin: 20px 0 6px;
        font-size: 14px;
    }

    input, textarea {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    .submit-btn {
        width: 100%;
        padding: 12px;
        margin-top: 25px;
        border: none;
        background: #8b97e8ff;
        border-radius: 8px;
        font-size: 16px;
        cursor: pointer;
    }
.right-side {
        width: 45%;
        background: url('{{ asset("images/contact-side.jpg") }}') center/cover no-repeat;
    }
</style>


<div class="contact-wrapper">
    <div class="contact-card">

        {{-- LEFT FORM --}}
        <div class="left-side">
            <h2>Get in touch</h2>
            <small>how can we help?</small>

            <form action="#" method="POST">
                @csrf

                <label>Name</label>
                <input type="text" name="name">

                <label>Email</label>
                <input type="email" name="email">

                <label>Message</label>
                <textarea name="message"></textarea>

                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>

        {{-- RIGHT IMAGE --}}
        <div class="right-side"></div>

    </div>
</div>

@endsection