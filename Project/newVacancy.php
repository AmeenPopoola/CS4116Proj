





<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/sound.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <style><?php include 'style.css'; ?></style>
</head>

<style>
    img{
        max-width: 100%;
        max-height: 100%;
        height:25px;
        width: 25px;
        color: #FFFFFF;
    }

</style>


<h1> Create New Audition</h1>
    <label>Note - To select multiple genres/instruments hold ctrl + click desired genres/Instruments</label><br>
   <form action="processVacancy.php" method="post">
    <label>Where are the additions being held? </label>
    <input placeholder= "Location" type="text" name="location" required>
    <br>
    <textarea name="description" placeholder="Describe the artist you are looking for" rows="4" cols="50" required></textarea>
    <br>
    <label>What genre(s) do you want artists to play in?</label><br>
    <select placeholder="Desired Genres" multiple class="chosen-select" name="genre[]" required>
            <option value=""></option>
            <option value="Pop">Pop</option>
            <option value="Rock">Rock</option>
            <option value="R&B">R&B</option>
            <option value="Hip-Hop">Hip-Hop</option>
            <option value="Jazz">Jazz</option>
            <option value="Classical">Classical</option>
            <option value="Dance">Dance</option>
            <option value="Traditional">Traditional</option>
          </select>
          <br>
          <label>What instrument(s) do you want artists to play?</label><br>
    <select placeholder="Desired Instruments" multiple class="chosen-select" name="instruments[]" required>
           <option value=""></option>
            <option value="Piano">Piano</option>
            <option value="Guitar">Guitar</option>
            <option value="Violin">Violin</option>
            <option value="Drums">Drums</option>
            <option value="Saxophone">Saxophone</option>
            <option value="Cello">Cello</option>
            <option value="Tinwhistle">Tinwhistle</option>
            <option value="Bass">Bass</option>
          </select>
          <br>
    <label>What date are the auditions?</label>
    <input type="date" name="audition_date" required> </input>
    <br>
          <input name="newVacancy" type="submit"> </input>
</form>
</body>
