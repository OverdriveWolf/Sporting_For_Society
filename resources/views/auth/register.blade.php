@extends('layouts.app')

@section('content')
    <div
        style="min-height: 100vh; background-color: #0b0f19; display: flex; align-items: center; justify-content: center; padding: 20px; box-sizing: border-box; width: 100%;">
        <div
            style="width: 100%; max-width: 1000px; background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); display: flex; flex-direction: row; flex-wrap: nowrap;">

            <!-- Left Hero Section -->
            <div
                style="width: 50%; min-height: 550px; background: linear-gradient(rgba(0, 0, 0, 0.65), rgba(0, 0, 0, 0.75)), url('https://images.unsplash.com/photo-1546519638-68e109498ffc?q=80&w=1000&auto=format&fit=crop'); background-size: cover; background-position: center; padding: 40px; display: flex; flex-direction: column; justify-content: space-between; color: #ffffff; box-sizing: border-box; flex-shrink: 0;">

                <!-- Logo Header -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('homepage.index') }}" class="flex items-center" style="gap: 0.75rem;">
                        <!-- Lime Icon Box -->
                        <div style="background-color: #CCFF00; min-width: 36px; min-height: 36px;"
                            class="p-2 rounded-lg flex items-center justify-center font-bold flex-shrink-0">
                            <svg class="w-5 h-5" fill="none" stroke="#000000" stroke-width="2.5" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <!-- Bold White Title -->
                        <span class="font-extrabold text-xl tracking-tight text-white uppercase italic whitespace-nowrap">
                            SPORT FOR SOCIETY
                        </span>
                    </a>
                </div>

                <!-- Main Heading & Subtitle -->
                <div style="margin: auto 0; padding: 30px 0;">
                    <h1
                        style="font-size: 32px; font-weight: 900; letter-spacing: -0.5px; line-height: 1.1; text-transform: uppercase; margin: 0 0 12px 0;">
                        Find your people.<br>
                        <span style="display: inline-block; margin-left: 15px;">Find your sport.</span>
                    </h1>
                    <p style="color: #d1d5db; font-size: 13px; line-height: 1.5; max-width: 320px; margin: 0;">
                        Join the largest neighborhood sports matchmaking platform. Book courts, organize local tournaments,
                        and build lifelong athletic bonds with verified citizens.
                    </p>
                </div>

                <!-- Stats Footer -->
                <div
                    style="display: flex; align-items: center; gap: 30px; border-top: 1px solid rgba(255, 255, 255, 0.2); padding-top: 16px;">
                    <div>
                        <div style="font-size: 24px; font-weight: 900; color: #ccff00;">50K+</div>
                        <div
                            style="font-size: 10px; text-transform: uppercase; color: #9ca3af; font-weight: 700; letter-spacing: 0.5px;">
                            Active Players</div>
                    </div>
                    <div>
                        <div style="font-size: 24px; font-weight: 900; color: #ccff00;">32</div>
                        <div
                            style="font-size: 10px; text-transform: uppercase; color: #9ca3af; font-weight: 700; letter-spacing: 0.5px;">
                            Disciplines</div>
                    </div>
                </div>
            </div>

            <!-- Right Form Section -->
            <div style="width: 50%; padding: 40px; background-color: #ffffff; display: flex; flex-direction: column; justify-content: center; box-sizing: border-box; flex-shrink: 0;"
                x-data="{ tab: '{{ request()->routeIs('register') || request()->is('register') ? 'register' : 'login' }}' }">

                <!-- Back to Homepage Button -->
                <div style="margin-bottom: 16px;">
                    <a href="{{ route('homepage.index') }}"
                        style="display: inline-flex; align-items: center; gap: 6px; font-size: 11px; font-weight: 800; color: #4b5563; text-decoration: none; text-transform: uppercase; letter-spacing: 0.5px; transition: color 0.2s;"
                        onmouseover="this.style.color='#000'" onmouseout="this.style.color='#4b5563'">
                        <svg style="width: 12px; height: 12px;" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Back to Homepage
                    </a>
                </div>

                <!-- Tab Switcher (Forced equal spacing via width: 50% on each button) -->
                <div
                    style="display: flex; background-color: #f3f4f6; padding: 4px; border-radius: 12px; margin-bottom: 24px; font-size: 12px; font-weight: bold; width: 100%; box-sizing: border-box;">
                    <button type="button" @click="tab = 'login'"
                        :style="tab === 'login' ? 'background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.1); color: #000; width: 50%;' : 'background: transparent; color: #6b7280; width: 50%;'"
                        style="padding: 10px 0; text-align: center; border-radius: 8px; cursor: pointer; border: none; transition: all 0.2s;">
                        Log In
                    </button>
                    <button type="button" @click="tab = 'register'"
                        :style="tab === 'register' ? 'background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,0.1); color: #000; width: 50%;' : 'background: transparent; color: #6b7280; width: 50%;'"
                        style="padding: 10px 0; text-align: center; border-radius: 8px; cursor: pointer; border: none; transition: all 0.2s;">
                        Register
                    </button>
                </div>

                <!-- Login Form -->
                <div x-show="tab === 'login'" style="display: none;"
                    :style="tab === 'login' ? 'display: block;' : 'display: none;'">
                    <form method="POST" action="{{ route('login') }}"
                        style="display: flex; flex-direction: column; gap: 16px;">
                        @csrf
                        <div>
                            <label for="login-email"
                                style="display: block; font-size: 10px; font-weight: 800; color: #6b7280; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px;">Email
                                Address</label>
                            <input type="email" id="login-email" name="email" value="{{ old('email') }}" required autofocus
                                placeholder="alex.jones@domain.com"
                                style="width: 100%; padding: 11px 14px; background-color: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 12px; box-sizing: border-box; outline: none;">
                            @error('email') <span
                                style="color: #ef4444; font-size: 11px; margin-top: 4px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="login-password"
                                style="display: block; font-size: 10px; font-weight: 800; color: #6b7280; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 6px;">Password</label>
                            <input type="password" id="login-password" name="password" required placeholder="••••••••••••"
                                style="width: 100%; padding: 11px 14px; background-color: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 12px; box-sizing: border-box; outline: none;">
                            @error('password') <span
                                style="color: #ef4444; font-size: 11px; margin-top: 4px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Remember me & Forgot Password Row -->
                        <div
                            style="display: flex; align-items: center; justify-content: space-between; font-size: 11px; color: #4b5563;">
                            <label style="display: flex; align-items: center; gap: 8px; cursor: pointer;">
                                <input type="checkbox" name="remember"
                                    style="border-radius: 4px; border: 1px solid #d1d5db; width: 14px; height: 14px;">
                                <span style="color: #6b7280;">Remember me</span>
                            </label>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    style="font-weight: 700; color: #111827; text-decoration: none;">Forgot Password?</a>
                            @endif
                        </div>

                        <button type="submit"
                            style="width: 100%; padding: 13px; background-color: #000; color: #ccff00; font-weight: 900; text-transform: uppercase; letter-spacing: 0.5px; border-radius: 8px; font-size: 12px; border: none; cursor: pointer; margin-top: 4px;">
                            Sign In To Your Account
                        </button>
                    </form>
                </div>

                <!-- Register Form -->
                <div x-show="tab === 'register'" style="display: none;"
                    :style="tab === 'register' ? 'display: block;' : 'display: none;'">
                    <form method="POST" action="{{ route('register') }}"
                        style="display: flex; flex-direction: column; gap: 14px;">
                        @csrf
                        <div>
                            <label for="register-name"
                                style="display: block; font-size: 10px; font-weight: 800; color: #6b7280; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Full
                                Name</label>
                            <input type="text" id="register-name" name="name" value="{{ old('name') }}" required
                                placeholder="Alex Jones"
                                style="width: 100%; padding: 10px 14px; background-color: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 12px; box-sizing: border-box; outline: none;">
                            @error('name') <span
                                style="color: #ef4444; font-size: 11px; margin-top: 4px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="register-email"
                                style="display: block; font-size: 10px; font-weight: 800; color: #6b7280; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Email
                                Address</label>
                            <input type="email" id="register-email" name="email" value="{{ old('email') }}" required
                                placeholder="alex.jones@domain.com"
                                style="width: 100%; padding: 10px 14px; background-color: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 12px; box-sizing: border-box; outline: none;">
                            @error('email') <span
                                style="color: #ef4444; font-size: 11px; margin-top: 4px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="register-password"
                                style="display: block; font-size: 10px; font-weight: 800; color: #6b7280; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Password</label>
                            <input type="password" id="register-password" name="password" required
                                placeholder="••••••••••••"
                                style="width: 100%; padding: 10px 14px; background-color: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 12px; box-sizing: border-box; outline: none;">
                            @error('password') <span
                                style="color: #ef4444; font-size: 11px; margin-top: 4px; display: block;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirmation"
                                style="display: block; font-size: 10px; font-weight: 800; color: #6b7280; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 4px;">Confirm
                                Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                placeholder="••••••••••••"
                                style="width: 100%; padding: 10px 14px; background-color: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; font-size: 12px; box-sizing: border-box; outline: none;">
                        </div>

                        <button type="submit"
                            style="width: 100%; padding: 13px; background-color: #000; color: #ccff00; font-weight: 900; text-transform: uppercase; letter-spacing: 0.5px; border-radius: 8px; font-size: 12px; border: none; cursor: pointer; margin-top: 4px;">
                            Create Account
                        </button>
                    </form>
                </div>

                <!-- Social Login Divider -->
                <div style="position: relative; margin: 20px 0;">
                    <div style="position: absolute; inset: 0; display: flex; align-items: center;">
                        <div style="width: 100%; border-top: 1px solid #e5e7eb;"></div>
                    </div>
                    <div
                        style="position: relative; display: flex; justify-content: center; font-size: 10px; text-transform: uppercase; letter-spacing: 0.5px;">
                        <span style="background-color: #ffffff; padding: 0 10px; color: #9ca3af; font-weight: 700;">Or
                            continue with</span>
                    </div>
                </div>

                <!-- Social Login Buttons -->
                <div style="display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 12px;">
                    <button type="button"
                        style="display: flex; align-items: center; justify-content: center; gap: 8px; border: 1px solid #e5e7eb; background: #fff; padding: 10px; border-radius: 8px; font-size: 12px; font-weight: 600; color: #374151; cursor: pointer;">
                        <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24">
                            <path fill="#4285F4"
                                d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                            <path fill="#34A853"
                                d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                            <path fill="#FBBC05"
                                d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.06H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.94l2.85-2.22.81-.63z" />
                            <path fill="#EA4335"
                                d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.06l3.66 2.84c.87-2.6 3.3-4.52 6.16-4.52z" />
                        </svg>
                        Google
                    </button>
                    <button type="button"
                        style="display: flex; align-items: center; justify-content: center; gap: 8px; border: 1px solid #e5e7eb; background: #fff; padding: 10px; border-radius: 8px; font-size: 12px; font-weight: 600; color: #374151; cursor: pointer;">
                        <svg style="width: 14px; height: 14px; fill: currentColor;" viewBox="0 0 24 24">
                            <path
                                d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M15.97 6.85c.66-.8 1.12-1.92.99-3.05-1 .04-2.21.67-2.91 1.49-.63.73-1.18 1.88-1.03 3 1.12.09 2.29-.56 2.95-1.44z" />
                        </svg>
                        Apple
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection