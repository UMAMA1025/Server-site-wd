<!DOCTYPE html>
<html>
<head>
    <title>Movie Manager (No Storage)</title>
    <meta charset="utf-8">
    <style>
        body {
            background: linear-gradient(to right, #db8585ff, #9ea2ceff);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            font-family: Arial, sans-serif;
        }
        .divv {
            padding: 10px;
            border: 3px solid #a1a4c0ff;
            margin-top: 20px;
            border-radius: 10px;
            background: white;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        table {
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 6px 12px;
            text-align: center;
        }
        h1 {
            color: #fff;
        }
        .message {
            background: #fff;
            border-radius: 8px;
            padding: 10px;
            margin-top: 15px;
            max-width: 500px;
        }
    </style>
</head>
<body>

    <h1>List of Movies</h1>

    <table>
        <tr><th>ISAN</th><th>Name</th><th>Year</th><th>Punctuation</th></tr>
        <?php foreach($Movies as $id => $m): ?>
        <tr>
            <td><?= htmlspecialchars($id) ?></td>
            <td><?= htmlspecialchars($m['name']) ?></td>
            <td><?= htmlspecialchars($m['year']) ?></td>
            <td><?= htmlspecialchars($m['punctuation']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php if ($message): ?>
        <div class="message"><?= $message ?></div>
    <?php endif; ?>

    <div class="divv">
        <h2>Add / Update / Delete Movie</h2>
    
        <form method="post">
            ISAN: <input type="text" name="isan"><br>
            Name: <input type="text" name="name"><br>
            Year: <input type="text" name="year"><br>
            Punctuation: 
            <select name="punctuation">
                <option value="">--Select--</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select><br>
            <input type="submit" value="Submit">
        </form>
    </div>

</body>
</html>