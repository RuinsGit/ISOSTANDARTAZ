<div class="comments-area">
    <div class="comments-container p-lr">
        <div class="general-comments-head">
            <h2>Müştəri rəyləri</h2>
            <div class="general-comments">
                <div class="total-comment-line">
                    <div class="stars">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    @if (count($comments) > 0)
                        <p>{{ ceil($comments->sum('rank') / count($comments)) }}</p>
                    @else
                        <p>0</p>
                    @endif
                    <span> ({{ count($comments) }} rəy)</span>
                </div>
                <div class="total-top-stars">
                    @for ($i = 1; $i <= 5; $i++)
                        <div class="total-top-star">
                            <div class="starsleft">
                                <p>{{ count($comments->where('rank', $i)) }}</p>
                                <div class="stars">
                                    @for ($j = 1; $j <= 5; $j++)
                                        <i class="bi bi-star-fill {{ $i <= $j ? 'active' : '' }}"></i>
                                    @endfor
                                </div>
                            </div>
                            <div class="star-line">
                                <span
                                    style="width: calc({{ count($comments->where('rank', $i)) }} / 12 * 100%);"></span>
                            </div>
                            <div class="total-comment">
                                <p>{{ count($comments->where('rank', $i)) }}</p> rəy
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div id="comments" class="comments">
            <div class="comments-filter">
                <div class="comment-resultCount">
                    <p>{{ count($comments) }}</p> rəy
                </div>
                <div class="comment-sort">
                    <p>Sırala</p>
                    <select name="" id="">
                        <option value="">Köhnədən yeniyə</option>
                        <option value="">Yenidən köhnəyə</option>
                    </select>
                </div>
            </div>
            <div class="comments-items">
                @foreach ($comments as $comment)
                    <div class="comment-item">
                        <div class="comment-item-top">
                            <div class="userImg">
                                <img src="{{ asset('front/assets/images/default-user.svg') }}" alt="">
                            </div>
                            <div class="comment-item-topDetail">
                                <div class="givenStars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $comment->rank)
                                            <i class="bi bi-star-fill"></i>
                                        @else
                                            <i class="bi bi-star"></i>
                                        @endif
                                    @endfor
                                </div>
                                <h3>{{ $comment->user->name }}</h3>
                            </div>
                        </div>
                        <span class="comment-date">{{ $comment->created_at->format('d/m/Y') }}</span>
                        <div class="comment-text">
                            <p>{{ $comment->info }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            @if (count($comments))
                <a href="" class="more-comments">Daha çox</a>
            @endif
        </div>
    </div>
</div>
