<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Card Layout</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="neighbour.css"> <!-- Link to the CSS file -->
  <style>
    .card {
      height: 100%;
    }
    .card-img-top, .card-iframe {
      height: 335px;
      object-fit: cover;
    }
    .card-iframe {
      width: 100%;
      border: 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="row">
      <!-- Card 1: Image -->
      <div class="col-md-4">
        <div class="card">
          <img src="images/card1.jpg" class="card-img-top" alt="Image Description">
          <div class="card-body">
            <p class="card-text">𝐎𝐮𝐫 𝐒𝐰𝐚𝐜𝐡𝐡 𝐁𝐡𝐚𝐫𝐚𝐭 𝐀𝐛𝐡𝐢𝐲𝐚𝐧 𝐈𝐧𝐢𝐭𝐢𝐚𝐭𝐢𝐯𝐞</p>
          </div>
        </div>
      </div>

      <!-- Card 2: Video -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-img-top">
            <iframe class="card-iframe" src="https://www.youtube.com/embed/bTCO59gN2oA" allowfullscreen></iframe>
          </div>
          <div class="card-body">
            <p class="card-text">𝐎𝐮𝐫 𝐬𝐨𝐜𝐢𝐞𝐭𝐲’𝐬 𝐃𝐮𝐫𝐠𝐚 𝐏𝐮𝐣𝐚 𝐰𝐚𝐬 𝐟𝐞𝐚𝐭𝐮𝐫𝐞𝐝 𝐨𝐧 𝐀𝐁𝐏 𝐀𝐧𝐚𝐧𝐝𝐚</p>
          </div>
        </div>
      </div>

      <!-- Card 3: Magazine -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-img-top">
            <iframe class="card-iframe" src="https://drive.google.com/file/d/1vUlUqmWqHusA1qcV46tPBLyZ2dbfvdvJ/preview" allowfullscreen></iframe>
          </div>
          <div class="card-body">
            <p class="card-text">𝐃𝐮𝐫𝐠𝐚 𝐏𝐮𝐣𝐚 𝟐𝟎𝟐𝟑 𝐌𝐚𝐠𝐚𝐳𝐢𝐧𝐞</p>
          </div>
        </div>
      </div>

      <!-- Card 4: Image -->
      <div class="col-md-4">
        <div class="card">
          <img src="images/card2.jpg"  class="card-img-top" alt="Image Description">
          <div class="card-body">
            <p class="card-text">𝐖𝐞 𝐰𝐞𝐫𝐞 𝐜𝐡𝐚𝐦𝐩𝐢𝐨𝐧𝐬 𝐨𝐟 𝐭𝐡𝐞 𝐍𝐊𝐃𝐀 𝐂𝐫𝐢𝐜𝐤𝐞𝐭 𝐋𝐞𝐚𝐠𝐮𝐞 𝟐𝟎𝟏𝟗</p>
          </div>
        </div>
      </div>

      <!-- Card 5: Video -->
      <div class="col-md-4">
        <div class="card">
          <div class="card-img-top">
            <iframe class="card-iframe" src="https://www.youtube.com/embed/iHFDPGue5fc" allowfullscreen></iframe>
          </div>
          <div class="card-body">
            <p class="card-text">𝐂𝐮𝐥𝐭𝐮𝐫𝐚𝐥 𝐄𝐯𝐞𝐧𝐭 𝐏𝐫𝐨𝐠𝐫𝐚𝐦</p>
          </div>
        </div>
      </div>

      <!-- Card 6: Image -->
      <div class="col-md-4">
        <div class="card">
          <img src="images/card3.png"  class="card-img-top" alt="Image Description">
          <div class="card-body">
            <p class="card-text">𝐎𝐮𝐫 𝐌𝐚𝐧𝐚𝐠𝐞𝐦𝐞𝐧𝐭 𝐓𝐞𝐚𝐦</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
