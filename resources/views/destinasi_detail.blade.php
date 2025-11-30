<div class="review-form">
    <h3>Beri Penilaian</h3>

    <form action="{{ route('review.store') }}" method="POST">
        @csrf
        <input type="hidden" name="destinasi_id" value="{{ $destinasi->id }}">

        <label>Rating</label>
        <select name="rating" required>
            <option value="1">⭐ 1</option>
            <option value="2">⭐⭐ 2</option>
            <option value="3">⭐⭐⭐ 3</option>
            <option value="4">⭐⭐⭐⭐ 4</option>
            <option value="5">⭐⭐⭐⭐⭐ 5</option>
        </select>

        <label>Komentar</label>
        <textarea name="komentar" placeholder="Tulis pengalamanmu..."></textarea>

        <button class="btn-submit">Kirim Review</button>
    </form>
</div>
