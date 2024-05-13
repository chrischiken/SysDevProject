<html>

<head>
    <title><?= $name ?> view</title>
</head>

<body>
    <div class='container'>
        <form method='post' action=''>
            <div class="form-group">
                <label>Rating:<input type="text" class="form-control" name="rating" value="<?= $data->rating ?>" /></label>
            </div>

            <div class="form-group">
                <label>Description:<textarea type="text" class="form-control"
                        name="description"><?= $data->description ?></textarea>
                </label>
            </div>
            <div class="form-group">
                <label>Add An Image:<input type="text" class="form-control" name="image_link" /></label>
            </div>

            <input type='Submit' value='Update' name='update_review'>
        </form>
    </div>
</body>

</html>