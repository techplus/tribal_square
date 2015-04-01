<div style="margin-left:15px;color:#999;font-size:15px;">	
	<h3 style="color:#8eaf52">You recently requested to reset your lost password</h3>
	<span>Dear {{ ucfirst($user->firstname) }},</span><br><br>
	<span>Recently your mail address was entered in to our lost password request form. Below we have provided a link that you can click on to reset your password. If this was not you simply delete this email and your password will remain unchanged.</span><br>
	<h3 style="color:#8eaf52">Password reset link.</h3>
	<table>
		<tbody>
		<tr>
			<td>Sign in email: </td>
			<td>{{ $user->email }}</td>
		</tr>
		<tr>
			<td>Link: </td>
			<td>{{ url('password/reset/'.$token) }}</td>
		</tr>
		</tbody>
	</table>
	<br><br>
	<span>Kind regards,</span><br>
	<span>Support Team,</span><br>
	<span>Tribal Square</span>
</div>

