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
                    <input type="text"
                        class="input"
                        name="usuario_nombre"
                        required
                        pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}"
                        maxlength="40]">
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>
                        <strong>Apellidos</strong>
                    </label>
                    <input type="text"
                        class="input"
                        name="usuario_apellidos"
                        required pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}"
                        maxlength="40]">
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column">
                <div class="control">
                    <label>
                        <strong>Usuario</strong>
                    </label>
                    <input type="text"
                        class="input"
                        name="usuario_usuario"
                        required pattern="[a-zA-Z0-9]{4,20}"
                        maxlength="20">
                </div>
            </div>
            <div class="column">
                <div class="control">
                    <label>
                        <strong>Email</strong>
                    </label>
                    <input type="email"
                        class="input"
                        name="usuario_email">
                </div>
            </div>
        </div>

        <div class="columns">
            <div class="column is-half">
                <div class="control">
                    <label>
                        <strong>Clave</strong>
                    </label>
                    <input type="password"
                        class="input"
                        name="usuario_clave"
                        required
                        pattern="[a-zA-Z0-9$@.\-]{7,100}"
                        maxlength="100">
                </div>
            </div>
            <div class="column is-half">
                <div class="control">
                    <label>
                        <strong> Repetir Clave</strong>
                    </label>
                    <input type="password"
                        class="input"
                        name="usuario_clave2"
                        required
                        pattern="[a-zA-Z0-9$@.\-]{7,100}"
                        maxlength="100">
                </div>
            </div>
        </div>

        <p class="has-text-centered mt-4">
            <button type="submit" class="button is-info is-rounded">Guardar</button>
        </p>
    </form>
</div>