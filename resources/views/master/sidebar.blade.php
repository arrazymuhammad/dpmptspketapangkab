<form>
    <div class="input-group input-group-lg">
        <input class="form-control" placeholder="Search..." name="s" id="s" type="text">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
        </span>
    </div>
</form>

<hr>

<div class="widget widget-categories">
    <h5 style="text-align: center;"><strong>Bupati & Wakil Bupati Ketapang</strong></h5>
    <center>
        <img src="{{ url('public/assets/img/bupati-wakil.png') }}" width="100%" height="100%">
    </center>
</div><!-- Categories end -->
<br>
<h4><strong>Link Terkait</strong></h4>
<ul class="nav nav-list mb-xlg">
    {!! AppHelper::get_link() !!}
</ul>
