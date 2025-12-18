<div class="container is-fluid mb-6">
    <h1 class="title">Usuarios</h1>
    <h2 class="subtitle">Nuevo Usuario</h2>
</div>

<div class="container pb-6 pt-6">
    <div class="form-rest mb-6 mt-6">
    </div>
    <form action="./php/usuario_guardar.php" class="formularioAjax" method="POST" autocomplete="off">
        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>
                        <strong>Nombres</strong>
                    </label>
                    <input type="text" class="input" name="usuario_nombre" required>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>
                        <strong>Apellidos</strong>
                    </label>
                    <input type="text" class="input" name="usuario_apellidos" required>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>
                        <strong>Usuario</strong>
                    </label>
                    <input type="text" class="input" name="usuario_usuario" required>
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>
                        <strong>Email</strong>
                    </label>
                    <input type="email" class="input" name="usuario_email" required>
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column is-half">
                <div class="control">
                    <label>
                        <strong>Clave</strong>
                    </label>
                    <input type="password" class="input" name="usuario_clave" required>
                </div>
            </div>
            <div class="column is-half">
                <div class="control">
                    <label>
                        <strong> Repetir Clave</strong>
                    </label>
                    <input type="password" class="input" name="usuario_clave2" required>
                </div>
            </div>
        </div>

        <p class="has-text-centered mt-4">
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>
    </form>
</div>