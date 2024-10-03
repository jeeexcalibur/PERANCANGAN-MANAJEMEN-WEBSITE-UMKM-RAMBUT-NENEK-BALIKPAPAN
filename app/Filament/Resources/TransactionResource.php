<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransactionResource\Pages;
use App\Models\Transaction;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class TransactionResource extends Resource
{
    protected static ?string $model = Transaction::class;

    protected static ?string $navigationIcon = 'heroicon-o-receipt-refund';
    protected static ?string $navigationLabel = 'Transaksi';
    protected static ?string $pluralLabel = 'Transaksi';
    protected static ?string $label = 'Transaksi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('status')
                    ->options([
                        'Diproses' => 'Diproses',  // Tampilkan 'Diproses' untuk opsi status
                        'Dikirim' => 'Dikirim',      // Tampilkan 'Dikirim' untuk opsi status
                        'Diterima' => 'Diterima',    // Tampilkan 'Diterima' untuk opsi status
                    ])
                    ->required(),
            ]);
    }
    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('Transaksi #')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Pelanggan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('total')
                    ->money('idr', true)
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->formatStateUsing(fn ($state) => ucfirst($state)) // Untuk kapitalisasi status
                    ->color(fn ($record) => match ($record->status) {
                        'Diproses' => 'warning',
                        'Dikirim' => 'info',
                        'Diterima' => 'success',
                        default => 'default', // Warna default jika tidak ada kecocokan
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('date')
                    ->form([
                        Forms\Components\DatePicker::make('from'),
                        Forms\Components\DatePicker::make('until'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        return $query
                            ->when($data['from'], fn($q) => $q->whereDate('created_at', '>=', $data['from']))
                            ->when($data['until'], fn($q) => $q->whereDate('created_at', '<=', $data['until']));
                    }),
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'Diproses' => 'Diproses',
                        'Dikirim' => 'Dikirim',
                        'Diterima' => 'Diterima',
                    ]),
                ]);
    }

    public static function getRelations(): array
    {
        return [
            // Tambahkan relasi jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTransactions::route('/'),
            'create' => Pages\CreateTransaction::route('/create'),
            'edit' => Pages\EditTransaction::route('/{record}/edit'),
        ];
    }
}
