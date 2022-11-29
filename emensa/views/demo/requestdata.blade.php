<h1>RequestData</h1>

@if(count($rd->getData()))
    <p>combined request data</p>
    <pre>
        {{print_r($rd->getData(),1)}}
    </pre>
@else
    <p>this request contained zero parameters</p>
@endif

@if(count($rd->getGetData()))
<p><code>GET</code> request data</p>
<pre>
    {{print_r($rd->getGetData(),1)}}
</pre>
@endif

@if(count($rd->getPostData()))
    <p><code>POST</code> request data</p>
    <pre>
        {{print_r($rd->getPostData(),1)}}
    </pre>
@endif