<div class="form">
	
	<table class="form__nav">
		<tbody>
			<tr>
				<th>Worker</th>
				<th>Department</th>
				<th>Amount</th>
				<th>Salary ($)</th>
			</tr>
		</tbody>
	</table>

	<form action="<?= url_origin.'save'; ?>" method="POST">
		<table class="form__worker">		
			<tbody>
				<?php foreach ($data['workers'] as $worker): ?>
					<tr class="visible">
						<td><?= $worker['worker'] ?></td>
						<td><?= $worker['department'] ?></td>
						<td><input class="form__amount" type="number" min=0 value="<?= $worker['amount'] ?>" data-price="<?= $data['department'][$worker['department']] ?>" name="amount[]"></td>
						<td><input class="form__salary" type="text" value="<?= $worker['salary'] ?>" readonly name="salary[]"></input></td>
					</tr>		
				<?php endforeach ?>
			</tbody>	
		</table>

		<!-- Button -->
		<div class="form__buttons">
			<a href="<?= url_origin.'remove'; ?>" class="form__button">Remove</a>
			<button class="form__button">Save</button>
		</div>
	
	</form>

</div>

