<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Facture</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; padding: 20px; border: 1px solid #000; }
        .header { text-align: center; margin-bottom: 20px; }
        .details, .total { width: 100%; border-collapse: collapse; margin-top: 20px; }
        .details th, .details td, .total th, .total td { border: 1px solid #000; padding: 8px; text-align: left; }
        .total th { text-align: right; }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">
            <h2>Facture #{{ $facture->numero_facture }}</h2>
            <p>Date : {{ $facture->date_emission }}</p>
            <p>Période : {{ $facture->periode }}</p>
        </div>

        <p><strong>Client :</strong> {{ $facture->client->nom }}</p>

        <table class="details">
            <thead>
                <tr>
                    <th>Code Bon</th>
                    <th>Montant</th>
                </tr>
            </thead>
            <tbody>
                @foreach($facture->client->bonsDachat as $bon)
                <tr>
                    <td>{{ $bon->code_bon }}</td>
                    <td>{{ number_format($bon->montant, 2) }} €</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <table class="total">
            <tr>
                <th>Total :</th>
                <td>{{ number_format($facture->montant_total, 2) }} €</td>
            </tr>
        </table>
    </div>

</body>
</html>
