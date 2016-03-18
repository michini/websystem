<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Boleta</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/contratoestilo.css')); ?>" media="all">
</head>
<body>
<div class="contenedor">
    <header class="header">
        <h1 class="title">Fotos y Filmaciones A1</h1>
        <h4 class="lema">Pasion por tus videos</h4>
        <h3 class="ruc">RUC: 11111145478</h3>
    </header>
    <div class="filmacion">
        <h3 style="text-align: center;font-size: 25px;margin-top: 30px;margin-bottom: 10px">N° Filmación</h3><br>
        <input type="text" value="<?php echo e($ultimo_evento->id); ?>" class="nrfilma">
    </div>
    <div class="clear"><hr></div>
    <section class="section">
        <table border="">
            <tr>
                <th>Cliente:</th>
                <td><?php echo e($ultimo_contrato->cliente->full_name); ?></td>
            </tr>
            <tr>
                <th>Familia:</th>
                <td><?php echo e($ultimo_contrato->cliente->familia); ?></td>
            </tr>
            <tr>
                <th>Direccion:</th>
                <td><?php echo e($ultimo_contrato->cliente->direccion); ?></td>
            </tr>
            <tr>
                <th>Celular:</th>
                <td><?php echo e($ultimo_contrato->cliente->celular); ?></td>
            </tr>
        </table>
    </section>
    <aside class="aside">
        <div style="width: 100%;">
            <h3 style="text-align: center;margin: 4px;">Fecha de contrato</h3>
            <input type="text" value="<?php echo e($ultimo_contrato->fecha_format); ?>" style="max-width: 92%; border-radius: 10px; text-align: center">
        </div>
        <div style="width: 100%; ">
            <h3 style="text-align: center">Fecha de filmacion</h3>
            <input type="text" value="<?php echo e($ultimo_contrato->evento->fecha_format); ?>" style="max-width: 92%; border-radius: 10px; text-align: center">
        </div>
        <div style="width: 100%; ">
            <h3 style="text-align: center">Lugar y hora</h3>
            <input type="text" value="<?php echo e($ultimo_contrato->evento->lugar.' '. $ultimo_contrato->evento->hora); ?>" style="max-width: 92%; border-radius: 10px; text-align: center">
        </div>
    </aside>
    <div class="clear"><hr></div>
    <section class="section">
        <h1 style="text-align: center; margin-top: 8px;">Compromiso</h1>
        <table style="margin-left: 15px;">
            <?php foreach($compromiso as $compro): ?>
                <tr>
                    <td><?php echo e($compro->nombre); ?></td>
                    <?php if($compro->id == $ultimo_evento->compromiso->id): ?>
                        <th><input type="checkbox" checked></th>
                    <?php else: ?>
                        <th><input type="checkbox"></th>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>

        </table>
    </section>
    <aside class="aside">
        <img src="<?php echo e(asset('img/fotografo.jpg')); ?>" alt="foto">
        <br>
        <h1 style="text-align: center">Pago</h1>
        <div style="width: 100%;">
            <h3 style="text-align: center;margin: 4px;">Acuenta</h3>
            <input type="text" value="<?php echo e('S/ '.$ultimo_pago->monto); ?>" style="max-width: 92%; border-radius: 10px; text-align: center">
        </div>
        <div style="width: 100%;">
            <h3 style="text-align: center;margin: 4px;">Resta</h3>
            <input type="text" value="<?php echo e('S/ '.($ultimo_evento->paquete->precio - $ultimo_pago->monto)); ?>" style="max-width: 92%; border-radius: 10px; text-align: center">
        </div>
        <div style="width: 100%;">
            <h3 style="text-align: center;margin: 4px;">Total</h3>
            <input type="text" value="<?php echo e('S/ '.$ultimo_evento->paquete->precio); ?>" style="max-width: 92%; border-radius: 10px; text-align: center">
        </div>
    </aside>
</div>
</body>
</html>