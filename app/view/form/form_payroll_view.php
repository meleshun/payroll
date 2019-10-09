<div class="form">
	
	<div class="form__control">
		<input class="form__search" id="search">
	</div>

	<table class="form__nav">
		<tbody>
			<tr>
				<th>Worker</th>
				<th class="decrease" id="sortDepartment" data-sort="department">Department</th>
				<th id="sortAmount" data-sort="amount">Amount</th>
				<th id="sortSalary" data-sort="salary">Salary ($)</th>
			</tr>
		</tbody>
	</table>


	<table class="form__worker">
		<tbody>
			<?php foreach ($data['workers'] as $worker): ?>
				<tr class="visible">
					<td data-search="<?= $worker['worker'] ?>"><?= $worker['worker'] ?></td>
					<td data-sort="department"><?= $worker['department'] ?></td>
					<td data-sort="amount"><?= $worker['amount'] ?></td>
					<td><span data-sort="salary"><?= $worker['salary'] ?></span>$</td>
				</tr>		
			<?php endforeach ?>
		</tbody>
	</table>

</div>