<div id="avcolor">

</div>
<script>
    function newsize(x){
        console.log(typeof(x));
        var y = "#8c8c93|#252030";
        var divtestsize= document.getElementById("avcolor");
        var x = x.split("|");
        console.log(x);
        for(i = 0 ;i<x.lenght;i++){

        }
    }
    newsize("#8c8c93");
</script>
{{--
  divtestsize.innerHTML = `<?php $co =  "<script>x</script>;"; ?>
        @for ($i=0;$i<count($co);$i++)
        <label id="radioa{{ $i }}" class="col-2 m-1 rounded-circle" style="height: 50px; width:50px; background-color:{{ $co[$i] }};">
                                            <input type="radio" name="color" value="{{ $co[$i] }}" id="radioa{{ $co[$i] }}" />
                                            <span></span>
                                        </label>
                                        @endfor`
        // document.getElementById("avcolor").appendChild(divtestsize);
        console.log(2);
        // y++;
        // document.getElementById("sizecount").value = y;
--}}
