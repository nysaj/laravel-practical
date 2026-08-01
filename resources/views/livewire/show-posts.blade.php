<div class="space-y-4">
    <flux:heading size="xl" level="1" class="mb-5">全記事一覧ページ</flux:heading>

    <div class="flex justify-between items-center mb-6 gap-4 mt-6">
        <flux:input wire:model.live="search" icon="magnifying-glass" class="w-64" placeholder="タイトルで検索"/>
        
        @auth
            <flux:button href="{{ route('posts.create') }}" wire:navigate variant="primary">
                新規作成
            </flux:button>    
        @endauth
    </div>

    <div>
        全{{ $posts->total() }}件
    </div>

    @foreach ($posts as $post)
        <article class="p-4 shadow-lg">
            <a href="/posts/{{ $post->id }}">
                <flux:text class="mt-4">{{ $post->created_at->format('y/m/d') }}</flux:text>
                <flux:heading size="lg" level="2">{{ $post->title }}</flux:heading>
                <flux:text class="mt-2">{{ Str::limit($post->body, 100) }}</flux:text>
                <flux:text class="mt-4">投稿者: {{ $post->user->name }}</flux:text>
            </a>
        </article>
    @endforeach

    {{ $posts->links() }}

    <button id="back-to-top" class="fixed bottom-4 right-4">↑TOPへ戻る</button>
</div>

<script>
    const backToTopButton = document.getElementById("back-to-top");

   backToTopButton.addEventListener("click", () => {
        window.scrollTo({
            left: 0,
            top: 0,
            behavior: "smooth"
        })
    });

    window.addEventListener("scroll", () => {
        if (window.scrollY >=300) {
            backToTopButton.classList.remove("hidden")
        } else {
            backToTopButton.classList.add("hidden")
        }
   });
</script>