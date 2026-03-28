<?php if (!empty($contatos)): ?>

<table class="table table-striped">
    <thead>
        <tr>
            <th>Nome</th>
            <th>Telefone</th>
            <th>Data</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($contatos as $c): ?>
        <tr>
            <td><?= htmlspecialchars($c->nome) ?></td>
            <td><?= htmlspecialchars($c->telefone) ?></td>
            <td><?= htmlspecialchars($c->data) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<?php else: ?>
    <p class="text-muted">Nenhum contato cadastrado.</p>
<?php endif; ?>