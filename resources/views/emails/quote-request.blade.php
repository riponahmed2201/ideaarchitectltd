<h2>New Consultation Request</h2>
<p><strong>Name:</strong> {{ $quote->name }}</p>
<p><strong>Email:</strong> {{ $quote->email }}</p>
<p><strong>Phone:</strong> {{ $quote->phone }}</p>
<p><strong>Service:</strong> {{ $quote->service_type ?? 'N/A' }}</p>
<p><strong>Budget:</strong> {{ $quote->budget ?? 'N/A' }}</p>
<p><strong>Preferred Date:</strong> {{ $quote->preferred_date?->format('Y-m-d') ?? 'N/A' }}</p>
<p><strong>Message:</strong></p>
<p>{{ $quote->message ?? 'N/A' }}</p>
