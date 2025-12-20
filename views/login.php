<div class="container">
    <form class="box" method="post" autocomplete="off">
        <h3 class="title is-2 is-spaced has-text-centered">Sistema de Inventario</h3>
        <div class="field">
            <label class="label subtitle is-5">Usuario</label>
            <div class="control">
                <input class="input"
                    name="login_usuario"
                    type="email"
                    placeholder="e.g. alex@example.com"
                    pattern="[a-zA-Z0-9]{4,20}"
                    maxlength="20"
                    required />
            </div>
        </div>

        <div class="field">
            <label class="label subtitle is-5">Password</label>
            <div class="control">
                <input class="input"
                    pattern="[a-ZA-Z0-9$@.-]{7,100}"
                    name="login_clave"
                    type="password"
                    placeholder="********"
                    maxlength="20"
                    required />
            </div>
        </div>
        <button class="button is-primary">Ingresar al Sistema</button>
        <?php
        if (isset($_POST["login_usuario"]) && isset($_POST["login_clave"])) {
            require_once "./php/main.php";
            require_once "./php/iniciar_sesion.php";
        }
        ?>

    </form>
</div>