
<?php include __DIR__ . '/_header.php'; ?>
<?php include __DIR__ . '/_navbar.php'; ?>
<?php

?>


<div class="container">
  <div class="row">
    <div class="col-lg-12">
      <form action="_searchbar2_api.php" method="GET" >
        <div class="form-group">
          <label for="exampleInputEmail1">Search</label>
          <input type="text" class="form-control" name="searchWord" aria-describedby="emailHelp" placeholder="Search for" id="searchBar">
          <small id="emailHelp" class="form-text text-muted"></small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
        <ul class="list-group" id="output">
<!--      --><?php //if(isset($_GET['searchWord'])): ?>
<!--      --><?php //foreach($rows as $row): ?>

<!--      --><?php //endforeach; ?>
<!--      --><?php //endif;?>
       </ul>
    </div>
  </div>
</div>

<script>

        let resultData;
        const searchBar = document.getElementById('searchBar');
        const output = document.getElementById('output');
        searchBar.addEventListener("change", ajaxSearch);
        searchBar.addEventListener("keyup", ajaxSearch);

        function ajaxSearch(e) {

                output.innerHTML = "";
                let searchWord = e.target.value;
                console.log(searchWord);
                fetch("./_searchbar2_api.php?searchWord=" + searchWord)
                    .then(response => response.json())
                    .then(json => {
                        resultData = json.data;
                        for (let i = 0; i < resultData.length; i++) {
                            output.innerHTML += `
                            <li class="list-group-item">
                                ${resultData[i].title}
                            </li>
                        `
                        }
                    });



        }
</script>






<?php include __DIR__ . '/_footer.php'; ?>









