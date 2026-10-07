<section style="background: #ffffff; padding: 1.5rem; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 1.5rem;">
    <header style="margin-bottom: 1.25rem;">
        <h2 style="font-size: 1.125rem; font-weight: 600; color: #1e293b; margin: 0 0 0.25rem 0;">
            Profile Information
        </h2>
        <p style="font-size: 0.875rem; color: #64748b; margin: 0;">
            Update your account's profile information and email address.
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <!-- Name Field -->
        <div style="margin-bottom: 1rem;">
            <label for="name" style="display: block; font-size: 0.875rem; font-weight: 500; color: #334155; margin-bottom: 0.375rem;">
                Name
            </label>
            <input 
                id="name" 
                name="name" 
                type="text" 
                value="{{ old('name', auth()->user()->name) }}" 
                required 
                autofocus 
                autocomplete="name"
                style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem; box-sizing: border-box;"
            >
            @error('name')
                <p style="color: #dc2626; font-size: 0.85rem; margin-top: 0.25rem; margin-bottom: 0;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Email Field -->
        <div style="margin-bottom: 1.25rem;">
            <label for="email" style="display: block; font-size: 0.875rem; font-weight: 500; color: #334155; margin-bottom: 0.375rem;">
                Email
            </label>
            <input 
                id="email" 
                name="email" 
                type="email" 
                value="{{ old('email', auth()->user()->email) }}" 
                required 
                autocomplete="username"
                style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem; box-sizing: border-box;"
            >
            @error('email')
                <p style="color: #dc2626; font-size: 0.85rem; margin-top: 0.25rem; margin-bottom: 0;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Save Button & Status Feedback -->
        <div style="display: flex; align-items: center; gap: 1rem;">
            <button 
                type="submit" 
                style="background-color: #2563eb; color: #ffffff; padding: 0.5rem 1rem; border: none; border-radius: 6px; font-weight: 500; cursor: pointer;"
            >
                Save Changes
            </button>

            @if (session('status') === 'profile-updated')
                <span style="font-size: 0.875rem; color: #16a34a; font-weight: 500;">
                    ✓ Saved successfully.
                </span>
            @endif
        </div>
    </form>
</section>