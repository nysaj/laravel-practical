<div class="space-y-4">
    <div class="flex justify-between items-center mb-6">
        <flex:heading size="lg" level="1">記事一覧ページ</flex:heading>
        @auth
            <flux:button href="{{ route('posts.create') }}" wire:navigate variant="primary">
                新規作成
            </flux:button>    
        @endauth
    </div>

    @foreach ($posts as $post)
        <article class="p-4 shadow-lg">
            <flux:text class="mt-4">{{ $post->created_at->format('y/m/d') }}</flux:text>
            <flux:heading size="lg" level="2">{{ $post->title }}</flux:heading>
            <flux:text class="mt-2">{{ Str::limit($post->body, 100) }}</flux:text>
            <flux:text class="mt-4">投稿者: {{ $post->user->name }}</flux:text>
        </article>
    @endforeach
</div>
