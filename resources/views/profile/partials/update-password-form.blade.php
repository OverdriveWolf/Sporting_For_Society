<section style="background: #ffffff; padding: 1.5rem; border-radius: 8px; border: 1px solid #e2e8f0; margin-bottom: 1.5rem;">
    <header style="margin-bottom: 1.25rem;">
        <h2 style="font-size: 1.125rem; font-weight: 600; color: #1e293b; margin: 0 0 0.25rem 0;">
            Update Password
        </h2>
        <p style="font-size: 0.875rem; color: #64748b; margin: 0;">
            Ensure your account is using a long, random password to stay secure.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <!-- Current Password Field -->
        <div style="margin-bottom: 1rem;">
            <label for="current_password" style="display: block; font-size: 0.875rem; font-weight: 500; color: #334155; margin-bottom: 0.375rem;">
                Current Password
            </label>
            <input 
                id="current_password" 
                name="current_password" 
                type="password" 
                autocomplete="current-password"
                style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem; box-sizing: border-box;"
            >
            @error('current_password', 'updatePassword')
                <p style="color: #dc2626; font-size: 0.85rem; margin-top: 0.25rem; margin-bottom: 0;">{{ $message }}</p>
            @enderror
            @error('current_password')
                <p style="color: #dc2626; font-size: 0.85rem; margin-top: 0.25rem; margin-bottom: 0;">{{ $message }}</p>
            @enderror
        </div>

        <!-- New Password Field -->
        <div style="margin-bottom: 1rem;">
            <label for="password" style="display: block; font-size: 0.875rem; font-weight: 500; color: #334155; margin-bottom: 0.375rem;">
                New Password
            </label>
            <input 
                id="password" 
                name="password" 
                type="password" 
                autocomplete="new-password"
                style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem; box-sizing: border-box;"
            >
            @error('password', 'updatePassword')
                <p style="color: #dc2626; font-size: 0.85rem; margin-top: 0.25rem; margin-bottom: 0;">{{ $message }}</p>
            @enderror
            @error('password')
                <p style="color: #dc2626; font-size: 0.85rem; margin-top: 0.25rem; margin-bottom: 0;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Confirm Password Field -->
        <div style="margin-bottom: 1.25rem;">
            <label for="password_confirmation" style="display: block; font-size: 0.875rem; font-weight: 500; color: #334155; margin-bottom: 0.375rem;">
                Confirm Password
            </label>
            <input 
                id="password_confirmation" 
                name="password_confirmation" 
                type="password" 
                autocomplete="new-password"
                style="width: 100%; padding: 0.5rem 0.75rem; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 0.875rem; box-sizing: border-box;"
            >
            @error('password_confirmation', 'updatePassword')
                <p style="color: #dc2626; font-size: 0.85rem; margin-top: 0.25rem; margin-bottom: 0;">{{ $message }}</p>
            @enderror
        </div>

        <!-- Save Button & Status Feedback -->
        <div style="display: flex; align-items: center; gap: 1rem;">
            <button 
                type="submit" 
                style="background-color: #2563eb; color: #ffffff; padding: 0.5rem 1rem; border: none; border-radius: 6px; font-weight: 500; cursor: pointer;"
            >
                Update Password
            </button>

            @if (session('status') === 'password-updated')
                <span style="font-size: 0.875rem; color: #16a34a; font-weight: 500;">
                    ✓ Password updated successfully.
                </span>
            @endif
        </div>
    </form>
</section>