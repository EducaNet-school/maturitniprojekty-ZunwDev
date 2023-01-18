<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <form id="form" method="post" class="ml-4 mt-4 flex w-48" onsubmit="return false">
        <div id="inputs" class="my-2 flex flex-col border border-2 border-sky-800 mx-2">
            <label for="shape" class="flex mx-2">Select shape</label>
            <select id="shape" name="shape" class="flex bg-slate-200 mx-2" onchange="updateForm()">
                <option value="empty">--*--</option>
                <option value="square">Square</option>
                <option value="rectangle">Rectangle</option>
                <option value="triangle">Triangle</option>
            </select>
            <div id="a-point" class="hidden">
                <label for="a" class="flex mx-2">A</label>
                <input id="a" type="number" name="a" class="flex border mx-2"><br>
            </div>
            <div id="b-point" class="hidden">
                <label for="b" class="flex mx-2">B</label>
                <input id="b" type="number" name="b" class="flex border mx-2"><br>
            </div>
            <div id="c-point" class="hidden">
                <label for="c" class="flex mx-2">C</label>
                <input id="c" type="number" name="c" class="flex border mx-2"><br>
            </div>
            <input type="submit" id="submit" class="bg-lime-600 hover:bg-lime-700 cursor-pointer mt-2 w-fit h-fit px-2 py-1 mx-auto mb-2">
        </div>
    </form>
    <script>
        function resetForm() {
            if (!$("#a-point").hasClass("hidden")) $("#a-point").toggleClass("hidden");
            if (!$("#b-point").hasClass("hidden")) $("#b-point").toggleClass("hidden");
            if (!$("#c-point").hasClass("hidden")) $("#c-point").toggleClass("hidden");
        }

        function resetOutput() {
            if ($("#output") != null) $("#output").remove();
        }

        function resetError() {
            if ($("#error") != null) $("#error").remove();
        }

        function toggleHidden(arr) {
            for (let i = 0; i < arr.length; i++) $("#" + arr[i]).toggleClass("hidden");
        }

        function updateForm() {
            resetForm();
            resetOutput();
            resetError();
            switch ($("#shape").val().toLowerCase()) {
                case "square":
                    toggleHidden(["a-point"]);
                    break;
                case "rectangle":
                    toggleHidden(["a-point", "b-point"])
                    break;
                case "triangle":
                    toggleHidden(["a-point", "b-point", "c-point"])
                    break;
                case "--*--":
                    break;
            }
        }

        function post(a, b, c, shape) {
            $.post("./geometryClass.php", {
                a: parseFloat(a),
                b: parseFloat(b),
                c: parseFloat(c),
                shape: $("#shape").val(),
            }).done(data => {
                $("#form").after(`<div id="output">${data}</div>`);
            });
        }

        function submit() {
            resetError()
            resetOutput();
            if ($("#shape").val() == "triangle") {
                if ($("#a").val() == "" || $("#b").val() == "" || $("#c").val() == "") {
                    $("#form").after("<p id='error'>Error, all values need to be inset</p>");
                    return;
                }
                if ($("#a").val() == $("#b").val() && $("#c").val() < $("#a").val() || $("#c").val() < $("#a").val()) {
                    $("#form").after("<p id='error'>Error, C value must be higher than A and B if doing inscolete triangle</p>")
                    return;
                } else {
                    post($("#a").val(), $("#b").val(), $("#c").val());
                }
            }
            if ($("#shape").val() == "rectangle") {
                if ($("#a").val() == "" || $("#b").val() == "") {
                    $("#form").after("<p id='error'>Error, all values need to be inset</p>")
                    return;
                } else {
                    post($("#a").val(), $("#b").val(), $("#c").val());
                }
            }
            if ($("#shape").val() == "square") {
                if ($("#a").val() == "") {
                    $("#form").after("<p id='error'>Error, all values need to be inset</p>")
                    return;
                } else {
                    post($("#a").val(), $("#b").val(), $("#c").val());
                }
            }
        }

        $("#submit").submit(function(e) {
            e.preventDefault();
        });
        $("#submit").click(function() {
            submit()
        })
    </script>
</body>

</html>