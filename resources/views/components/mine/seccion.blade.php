<style> 
  .container {
    width: 1920px;
    height: auto;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 30px auto;
    gap:30px;
  }

  .card {
    width: calc((100% - 60px) / 3);
    height: 492px;
    border-radius: 30px;
    background: lightgrey;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 30px 50px -12px inset, 
                rgba(0, 0, 0, 0.3) 0px 18px 26px -18px inset;
    transition: all .5s ease;
  }

  .card:nth-child(1){
    background-image: url("https://w.wallhaven.cc/full/od/wallhaven-od8zzp.jpg");
    background-size: cover;
    background-position: center;
  }
  .card:nth-child(2){
    background-image: url("https://w.wallhaven.cc/full/n6/wallhaven-n6lj56.jpg");
    background-size: cover;
    background-position: center;
  }
  .card:nth-child(3){
    background-image: url("https://w.wallhaven.cc/full/1j/wallhaven-1jy971.jpg");
    background-size: cover;
    background-position: center;
  }

  .card:nth-child(4){
    background-image: url("https://w.wallhaven.cc/full/x1/wallhaven-x1gx5l.jpg");
    background-size: cover;
    background-position: center;
  }
  .card:nth-child(5){
    background-image: url("https://w.wallhaven.cc/full/k9/wallhaven-k95m31.jpg");
    background-size: cover;
    background-position: center;
  }
  .card:nth-child(6){
    background-image: url("https://w.wallhaven.cc/full/lq/wallhaven-lqp5ep.jpg");
    background-size: cover;
    background-position: center;
  }
  .card:hover {
    transform: scale(1.1);
  }
</style>
  <div class="container">
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
    <div class="card"></div>
  </div>