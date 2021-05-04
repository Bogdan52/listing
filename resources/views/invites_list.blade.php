	<?php if ($inviteing_companies==null): ?>
		No invites
	<?php else: ?>
	@foreach($inviteing_companies as $cinv )
				<tr>
					<td>
						{{$cinv->id}}
					</td>
					<td>
						{{$cinv->name}}
					</td>
					<td>
						<button class="button button1" onclick="inviteAccept('{{$cinv->id}}')">Accept</button>
					</td>
					<td>
						<button class="button button1" onclick="deleteInvite('{{$cinv->id}}')">Reject</button>
					</td>
				</tr>
	@endforeach
	<?php endif ?>