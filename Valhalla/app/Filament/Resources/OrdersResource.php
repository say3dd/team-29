<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrdersResource\Pages;
use App\Filament\Resources\OrdersResource\RelationManagers;
use App\Models\Orders;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrdersResource extends Resource
{
    protected static ?string $model = Orders::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('product_name')->label('Product Name')->required(),
                Select::make('status')->options([
                    'Order Placed' => 'Order Placed',
                    'Picked up by Courier' => 'Picked up by Courier',
                    'In Transit' => 'In Transit',
                    'Delivered' => 'Delivered',
                ])->required(),
                TextInput::make('price')
                    ->label('Price')
                    ->numeric()
                    ->placeholder('Enter price (e.g., 123.45)')
                    ->readOnlyOn('edit'),
                TextInput::make('tracking_number')->label('Tracking Number')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('product_name')->label('Product Name')->searchable()->sortable(),
                TextColumn::make('product_id')->label('product ID')->searchable()->sortable(),
                TextColumn::make('status')->label('Status')->sortable()->toggleable()->searchable(),
                TextColumn::make('quantity')->label('Quantity')->sortable()->searchable()->sortable(),
                TextColumn::make('price')->label('Price')->numeric()->searchable()->sortable(),
                TextColumn::make('tracking_number')->label('Tracking Number')->sortable()->searchable()->sortable(),
                TextColumn::make('created_at')->label('Order Date')->dateTime()->searchable()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrders::route('/create'),
            'edit' => Pages\EditOrders::route('/{record}/edit'),
        ];
    }
}
