<div><input type="text" name="title" value="{{ old('title', optional($post ?? null)->title) }}"></div>

@error('title')
    {{-- display specific column's error --}}
    <div>{{ $message }}</div>
@enderror

<div><textarea name="content">{{ old('content', optional($post ?? null)->content) }}</textarea></div>

{{-- this page is used by create & edit page --}}
{{-- but we don't need to show $post at create page --}}
{{-- so add "optional" to avoid laravel display error--}}